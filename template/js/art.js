/**
 * Author: Seasle
 */
(() => {
    const canvas = document.querySelector('[data-art]');
    const context = canvas.getContext('2d');

    const TAU = Math.PI * 2;

    /**
     * Создает фигуру для рисования
     * @returns {Path2D} Фигура
     */
    const createShape = () => {
        const shape = new Path2D();

        const innerRadius = 2;
        const outerRadius = 4;

        for (let point = 0; point < 10; point++) {
            const angle = TAU / 10 * point;
            const radius = point % 2 === 0 ? innerRadius : outerRadius;
            const x = Math.cos(angle) * radius;
            const y = Math.sin(angle) * radius;

            if (point === 0) {
                shape.moveTo(x, y);
            } else {
                shape.lineTo(x, y);
            }
        }

        shape.closePath();

        return shape;
    };

    /**
     * Создает debounce-обёртку вокруг функции
     * @param callback Функция
     * @param duration Задержка
     * @returns {function(...[*])} Обёртка
     */
    const debounce = (callback, duration) => {
        let timeout = null;

        return (...args) => {
            clearTimeout(timeout);

            timeout = setTimeout(callback, duration, ...args);
        };
    };

    /**
     * Линейная интерполяция
     * @param min Минимальное значение
     * @param max Максимальное значение
     * @param value Нормализованное значение (от 0 до 1)
     * @returns {number} Интерполированное значение между минимум и максимумом
     */
    const lerp = (min, max, value) => {
        return (1 - value) * min + value * max;
    };

    const particles = [];
    const shape = createShape();
    const connectDistance = 50;
    const screenOffset = -50;
    const speedModifier = 2;

    /**
     * Рисование
     */
    const update = () => {
        context.clearRect(0, 0, canvas.width, canvas.height);

        context.fillStyle = '#222222';
        context.strokeStyle = '#222222';
        context.globalAlpha = 0.25;

        const count = particles.length;
        for (let current = 0; current < count; current++) {
            for (let next = current + 1; next < count; next++) {
                const distance = Math.hypot(
                    particles[next].x - particles[current].x,
                    particles[next].y - particles[current].y
                );

                if (distance <= connectDistance) {
                    context.beginPath();
                    context.moveTo(particles[current].x, particles[current].y);
                    context.lineTo(particles[next].x, particles[next].y);
                    context.closePath();
                    context.lineWidth = 1 - distance / connectDistance;
                    context.stroke();
                }
            }
        }

        context.globalAlpha = 0.75;

        for (const particle of particles) {
            context.save();
            context.translate(particle.x, particle.y);
            context.rotate(particle.rotate);
            context.fill(shape);
            context.restore();

            particle.x += particle.velocity.x * speedModifier;
            particle.y += particle.velocity.y * speedModifier;

            if (particle.x < screenOffset) {
                particle.x = canvas.width - screenOffset;
            }

            if (particle.x > canvas.width - screenOffset) {
                particle.x = screenOffset;
            }

            if (particle.y < screenOffset) {
                particle.y = canvas.height - screenOffset;
            }

            if (particle.y > canvas.height - screenOffset) {
                particle.y = screenOffset;
            }
        }

        requestAnimationFrame(update);
    };

    /**
     * Первичная генерация точек
     */
    const generate = () => {
        const count = Math.round((canvas.width * canvas.height) ** (1 / 2.75));

        for (let index = 0; index < count; index++) {
            const particle = {
                x: lerp(screenOffset, canvas.width - screenOffset, Math.random()),
                y: lerp(screenOffset, canvas.height - screenOffset, Math.random()),
                velocity: {
                    x: (Math.random() - 0.5) * 2,
                    y: (Math.random() - 0.5) * 2
                },
                rotate: Math.random() * TAU
            };

            particles.push(particle);
        }
    };

    /**
     * Изменение размеров холста
     */
    const resize = () => {
        const parent = canvas.parentElement;

        if (parent !== null) {
            const size = parent.getBoundingClientRect();

            [canvas.width, canvas.height] = [size.width, size.height];
        } else {
            [canvas.width, canvas.height] = [innerWidth, innerHeight];
        }
    };

    /**
     * Инициализация
     */
    const init = () => {
        resize();
        generate();
        requestAnimationFrame(update);
    };

    window.addEventListener('DOMContentLoaded', init);
    window.addEventListener('resize', debounce(resize, 50));
})();
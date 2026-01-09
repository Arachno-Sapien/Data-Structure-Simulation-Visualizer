let queueData = [];
let container;

document.addEventListener('DOMContentLoaded', () => {
    container = document.getElementById('queueDisplay');
    render();
});

function render() {
    if (!container) return;

    container.innerHTML = '';

    queueData.forEach((value, index) => {
        const node = document.createElement('div');
        node.className = 'node';

        let label = '';
        if (index === 0) label = 'FRONT';
        if (index === queueData.length - 1) label = 'REAR';

        node.innerHTML = `
            <div>${value}</div>
            ${label ? `<div class="node-label">${label}</div>` : ''}
        `;

        container.appendChild(node);
    });
}

function enqueue() {
    const input = document.getElementById('queueInput');
    if (!input.value) return alert("Please enter a value");

    queueData.push(input.value);
    input.value = '';
    render();
}

function dequeue() {
    if (queueData.length === 0) return alert("Queue Underflow!");
    queueData.shift();
    render();
}

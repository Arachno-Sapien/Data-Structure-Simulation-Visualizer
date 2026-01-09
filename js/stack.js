let stackData = [];
const container = document.getElementById('stackDisplay');

function render() {
    container.innerHTML = '';
    stackData.forEach(value => {
        let node = document.createElement('div');
        node.className = 'node';
        node.innerText = value;
        container.appendChild(node);
    });
}

function push() {
    const input = document.getElementById('stackInput');
    if(!input.value) return alert("Please enter a value");
    
    stackData.push(input.value);
    render();
    input.value = '';
}

function pop() {
    if(stackData.length === 0) return alert("Stack Underflow!");
    stackData.pop();
    render();
}
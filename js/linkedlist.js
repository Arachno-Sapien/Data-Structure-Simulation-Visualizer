let list = [];

function render() {
    const container = document.getElementById('llDisplay');
    container.innerHTML = '';
    
    list.forEach((val, index) => {
        // Create Node
        let nodeWrapper = document.createElement('div');
        nodeWrapper.className = 'll-node';
        nodeWrapper.innerHTML = `<div class='node'>${val}<br><small>idx:${index}</small></div>`;
        
        // Add Arrow if not last element
        if (index < list.length - 1) {
            nodeWrapper.innerHTML += `<div class='arrow'>&rarr;</div>`;
        } else {
             nodeWrapper.innerHTML += `<div class='arrow'>NULL</div>`;
        }
        
        container.appendChild(nodeWrapper);
    });
}

function addHead() {
    let val = document.getElementById('llVal').value;
    if(!val) return;
    list.unshift(val);
    render();
}

function addTail() {
    let val = document.getElementById('llVal').value;
    if(!val) return;
    list.push(val);
    render();
}

function addAtPos() {
    let val = document.getElementById('llVal').value;
    let idx = parseInt(document.getElementById('llIndex').value);
    
    if(!val || isNaN(idx)) return alert("Enter Value and Index");
    if(idx < 0 || idx > list.length) return alert("Invalid Index");
    
    list.splice(idx, 0, val);
    render();
}

function removeHead() {
    if(list.length === 0) return alert("Empty List");
    list.shift();
    render();
}
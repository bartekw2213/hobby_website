$('#leftArrow').click(() => changeBackground('left'));
$('#rightArrow').click(() => changeBackground('right'));
$( "#dialog" ).dialog({ autoOpen: false });
$( "#priority" ).selectmenu();

window.addEventListener('load', loadNotes);

$('#backpackForm').submit(() => {
    onBackpackFormSubmition();
    return false;
})


let backgroundIndex = 0;

function changeBackground(direction) {
    const previousBackgroundIndex = backgroundIndex;
    let imageUrl = '';

    if(direction === 'left' && backgroundIndex > 0)
        backgroundIndex--;
    if(direction === 'right' && backgroundIndex < 2)
        backgroundIndex++;

    if(previousBackgroundIndex === backgroundIndex)
        return;

    $('#backpackLanding').css('background-image', `url(\'../resources/images/backpackIntroduction${backgroundIndex}.jpg\')`)
}

function onBackpackFormSubmition() {
    const data = getBackpackFormData();
    addItemToList(data);
    saveToLocalStorage(data);
    showModal("Przedmiot z powodzeniem został dodany do listy!");
}

function getBackpackFormData() {
    return {
            name: $('#name').val(),
            weight: $('#weight').val(),
            priority: $('#priority').val(),
            packed: ($('#packed1').is(':checked')) ? 'Tak' : 'Nie',
            quantity: $('#quantity').val(),
            color: $('#color').val(),
            notes: $('#notes').val(),
            removeBtn: 'X'
    }
}

function addItemToList(data) {
    const tableRow = document.createElement('tr');
    for(const property in data) {
        const td = document.createElement('td');
        switch(property){
            case 'removeBtn':
                createRemoveBtn(td);
                break;
            case 'color':
                createColorTd(td, data[property]);
                break;
            default:
                td.innerText = data[property] ? data[property] : "-";
        }
        tableRow.appendChild(td);
    }
    $('#tableBody').append(tableRow); 
    toggleBackpackTableVisibility(true);  
}

function saveToLocalStorage(data) {
    const storage = getLocalStorage();
    storage.push(data);
    window.localStorage.setItem('items', JSON.stringify(storage));
}

function removeItemFromStorage(itemName) {
    const newStorage = getLocalStorage().filter(item => item.name !== itemName);
    window.localStorage.setItem('items', JSON.stringify(newStorage));

    if (newStorage.length < 1)
        toggleBackpackTableVisibility(false);
}

function getLocalStorage() {
    const storage = window.localStorage.getItem('items');
    return storage ? JSON.parse(storage) : [];
}

function showModal(text) {
    $( "#dialog" ).html( text );
    $( "#dialog" ).dialog( "open" );
}

function loadNotes() {
    const storage = getLocalStorage();
    storage.forEach(item => addItemToList(item))

    if(storage.length > 0)
        toggleBackpackTableVisibility(true);
}

function createRemoveBtn(td) {
    const removeBtnImage = document.createElement('img');
    removeBtnImage.src = "../resources/images/backpackRemoveBtn.png"
    removeBtnImage.addEventListener('click', e => onRemoveBtn(e));
    td.appendChild(removeBtnImage);
}

function onRemoveBtn(e) {
    e.target.parentNode.parentNode.remove()
    removeItemFromStorage(e.target.parentNode.parentNode.firstChild.innerText)
}

function toggleBackpackTableVisibility(show) {
    if(show) {
        $('#backpackTable').show();
        return;
    }

    $('#backpackTable').hide();
}

function createColorTd(td, color) {
    td.style.backgroundColor = color;
}

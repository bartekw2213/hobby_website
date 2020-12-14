const navigation = document.getElementById('navigation');
const navigationNav = document.getElementById('navigationNav');
const notebook = document.getElementById('notebook');
const notebookList = document.getElementById('notebookList');
const notebookForm = document.getElementById('notebookForm');

window.addEventListener('load', () => {
    const notes = loadNotes();
    notes.forEach(note => {
        appendNoteToList(note);
    })
})

window.addEventListener('scroll', () => {
    if(window.scrollY > 100) {
        navigation.style.backgroundColor = "var(--maroon)";
        navigation.style.boxShadow = "0 5px 10px rgba(0,0,0,.5)";
    }
    else {
        navigation.style.backgroundColor = "transparent";  
        navigation.style.boxShadow = "none";
    }
    
    if(!notebook)
        return;

    if(isElementIntoView(notebook) || window.innerWidth < 540) {
        notebook.style.transform = "rotateY(1deg) rotateX(-1deg)";
        notebook.parentElement.style.transform = "translate(0px, 0px)";
    } else {
        if(window.innerWidth < 1000 && window.innerWidth > 810) {
            notebook.parentElement.style.transform = "translate(-50px, -100px)";
        } else if(window.innerWidth <= 810) {
            notebook.parentElement.style.transform = "translate(0px, -200px)";
        } else {
            notebook.parentElement.style.transform = "translate(-100px, -100px)";
        }
        notebook.style.transform = "rotateY(-50deg) rotateX(80deg)"
    }
})  

if(notebookForm) {
    notebookForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const noteToSave = notebookForm.firstElementChild.value;
        appendNoteToList(noteToSave);
        saveNoteToSessionStorage(noteToSave);
        notebookForm.firstElementChild.value = "";
    })
}

function isElementIntoView(elem)
{
    if(!elem) return;

    const docViewTop = $(window).scrollTop();
    const docViewBottom = docViewTop + $(window).height();

    const elemTop = $(elem).offset().top;
    const elemBottom = elemTop + $(elem).height();

    if(window.innerWidth < 600) {
        return ((elemBottom <= (docViewBottom + 120)) && (elemTop >= docViewTop + 120))
    }

    return ((elemBottom <= (docViewBottom + 50)) && (elemTop >= docViewTop + 50));
}

function saveNoteToSessionStorage(note)
{
    let previousNotes = loadNotes();

    previousNotes.push(note);

    previousNotes = JSON.stringify(previousNotes);
    sessionStorage.setItem("notes", previousNotes)
}

function loadNotes() {
    let notes = sessionStorage.getItem("notes");

    if(!notes)
        notes = [];
    else
        notes = JSON.parse(notes);

    return notes;    
}

function appendNoteToList(text) {
    const noteToAdd = document.createElement('li');
    const cancelNoteBtn = document.createElement('button');
    const noteText = document.createElement('p')
    cancelNoteBtn.innerText = 'X';
    noteText.innerText = text;
    cancelNoteBtn.addEventListener('click', () => removeNote(noteToAdd, text))
    noteToAdd.appendChild(cancelNoteBtn);
    noteToAdd.appendChild(noteText);
    notebookList.appendChild(noteToAdd);
}

function removeNote(noteToDelete, textFromNote) {
    noteToDelete.remove();

    let notes = loadNotes();
    notes = notes.filter(note => note !== textFromNote);
    sessionStorage.setItem("notes", JSON.stringify(notes))
}
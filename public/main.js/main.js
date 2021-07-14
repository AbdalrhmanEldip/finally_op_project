//--------- SET || MAIN || VARIABLES || START ------------------>
let parent_load = document.querySelectorAll('.parent_load div');
//--------- SET || MAIN || VARIABLES || END------------------>



//-------------Load || Animation || Ui || Start --------------------->
window.addEventListener('load',() => {
    setTimeout(() => {
     parent_load[0].classList.add('active_load_1');
    },100)
    setTimeout(() => {
     parent_load[2].classList.add('active_load_1');
    },300)
    setTimeout(() => {
     parent_load[1].classList.add('active_load_2');
    },500)
    setTimeout(() => {
     parent_load[3].classList.add('active_load_2');
    },700)
 })
 //-------------Load || Animation || Ui || End --------------------->
//--------- SET || MAIN || VARIABLES || START ------------------>
let fa_bars           = document.querySelector('.fa-bars');
let main              = document.querySelector('main');
let fa_cog            = document.querySelector('.fa-cog');
let cogs_bar          = document.querySelector('.cogs_bar');
let cogs_bar_close    = document.querySelector('.cogs_bar_close');
//--------- SET || MAIN || VARIABLES || END------------------>


//--------- SET || MAIN || EVENT || START ------------------>
fa_bars.addEventListener('click',() => {
    main.classList.toggle('active_main');
    cogs_bar.classList.remove('active_cog_bar');
})
fa_cog.addEventListener('click',() => {
  cogs_bar.classList.add('active_cog_bar');
  main.classList.remove('active_main');
})
cogs_bar_close.addEventListener('click',() => {
    cogs_bar.classList.remove('active_cog_bar');
})
//--------- SET || MAIN || EVENT || END------------------>
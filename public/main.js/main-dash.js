//--------- SET || MAIN || VARIABLES || START ------------------>
let fa_bars                       = document.querySelector('.fa-bars');
let main                          = document.querySelector('main');
let fa_plus                       = document.querySelectorAll('.fa-plus');
let set_data_form                 = document.querySelector('.set_data_form');
let form_close                    = document.querySelectorAll('.form_close');
let fa_cog                        = document.querySelector('.fa-cog');
let cogs_bar                      = document.querySelector('.cogs_bar');
let cogs_bar_close                = document.querySelector('.cogs_bar_close');
let table_main_row                = document.querySelectorAll('.table .main_row');
let search_inp_2_search_icon      = document.querySelector('.search_inp_2 button')
let search_inp_2                  = document.querySelector('.search_inp_2')
let search_inp_2_input            = document.querySelectorAll('.search_inp_2 input');
let get_data_form                 = document.querySelectorAll('.get_data_form');
let get_data_form_2               = document.querySelectorAll('.get_data_form_2');
let get_data_form_inp             = document.querySelectorAll('.get_data_form input');
let fa_pencil_square_o            = document.querySelectorAll('.fa-pencil-square-o');
let get_data_inp                  = document.querySelector('#get_data_inp');
let name_search_inp               = document.querySelectorAll('#name_search_inp');
let search_btn_sm_media           = document.querySelector(".search_btn-sm-media");
let fa_level_up                   = document.querySelector('.fa-level-up');
let table                         = document.querySelector('.table');
//--------- SET || MAIN || VARIABLES || END------------------>

//--------- SET || MAIN || EVENT || START ------------------>
fa_bars.addEventListener('click',() => {
    main.classList.toggle('active_main');
    cogs_bar.classList.remove('active_cog_bar');
})
fa_plus.forEach(s => s.addEventListener('click',() => {
    set_data_form.classList.add('active_form');
    cogs_bar.classList.remove('active_cog_bar');
}))

fa_cog.addEventListener('click',() => {
  cogs_bar.classList.add('active_cog_bar');
  main
  .classList.remove('active_main');
})

cogs_bar_close.addEventListener('click',() => {
    cogs_bar.classList.remove('active_cog_bar');
})

search_inp_2_search_icon.addEventListener('mouseenter',(e) => {
    e.preventDefault();
    search_inp_2.classList.add('active_search_inp_2');
    e.target.style.display = 'none';
})

//-----------    Set || Moblie || Search || Data || Start ----------------------->
get_data_inp.addEventListener('input',(e) => {
    name_search_inp.forEach((s,index) => {
        search_btn_sm_media.addEventListener('click',() => {
            if(e.target.value == '')
            {
                e.target.value = 'البينات غير صحيحه من فضلك ادخل بينات صحيحه';
            }else
            {
                if(s.value == e.target.value)
                {
                 get_data_form_2[index].classList.add('active_form');
                 e.target.value = '';
                 e.target.classList.add('del_active_inp');
                 setTimeout(() => {
                    e.target.value = '';
                    e.target.classList.remove('del_active_inp');
                   },1000)
                }else
                {
                    e.target.value = 'البينات غير صحيحه من فضلك ادخل بينات صحيحه';
                    e.target.classList.add('del_active_inp');
                    setTimeout(() => {
                     e.target.value = '';
                     e.target.classList.remove('del_active_inp');
                    },1000)
                }
            }
        })
       form_close.forEach(s => s.addEventListener('click',() => {
        get_data_form_2[index].classList.remove('active_form');
       }))    
    });
})
//-----------    Set || Moblie || Search || Data || End ----------------------->

form_close.forEach(s => s.addEventListener('click',() => {
    get_data_form.forEach(s => s.classList.remove('active_form'))
    set_data_form.classList.remove('active_form')
    get_data_form_2.classList.remove('active_form');
}))
//--------- SET || MAIN || EVENT || END------------------>





//-------------Active || Color || Ui || End --------------------->
fa_pencil_square_o.forEach((s,index) => {
    s.addEventListener('click',() => {
        get_data_form[index].classList.add('active_form');
    })
})

//---------------- Scroll || Up || Start  ----------------------------------->
table.addEventListener('scroll',(e) => {
    e.target.scrollTop > 0 ? fa_level_up.classList.add('show_up'):fa_level_up.classList.remove('show_up');
    fa_level_up.addEventListener('click',() => {
        e.target.scrollTop = 0;
    })
})
//---------------- Scroll || Up || End ----------------------------------->
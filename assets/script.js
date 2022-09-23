function CheckTheme(){
    if (document.body.classList.contains('white_theme')){
        ChangeTheme('black_theme')} 
    else ChangeTheme('white_theme');
}

function ChangeTheme(theme){
    document.body.classList.remove('white_theme'); 
    document.body.classList.remove('black_theme'); 

    document.body.classList.add(theme);
    if (theme == 'white_theme'){
        document.getElementById("sidebar_logo").src = "assets/img/sidebar_logo_black.svg"
    }
    else {
        document.getElementById("sidebar_logo").src = "assets/img/sidebar_logo_white.svg"
    }
}
function go_to_signup(){
    const signip_form = document.getElementById("signup_form");
    const login_form = document.getElementById("login_form");

    if(signip_form.style.display == 'none'){
        signip_form.style.display = 'flex';
        login_form.style.display = 'none';
    }else{
        signip_form.style.display = 'none';
        login_form.style.display = 'flex';
    }
}

function gtl(){
    const signip_form = document.getElementById("signup_form");
    const login_form = document.getElementById("login_form");

    console.log("button clicked");

    signip_form.style.display = 'none';
    login_form.style.display = 'flex';
}

function gtsc(){
    const first_col = document.getElementById("fc");
    const second_col = document.getElementById("sc");
    const button = document.getElementById("gtsc");
    const back_button = document.getElementById("gtfc");

    first_col.style.display = 'none';
    second_col.style.display = 'flex';
    button.style.display = 'none';
    back_button.style.display = 'flex';
}
function previewImage(event) {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            console.log("Image Loaded: ", e.target.result);
            document.getElementById("profile-image").src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        console.log("No file selected");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const nextButton = document.getElementById("gtsc");
    const firstColumn = document.getElementById("fc");
    const secondColumn = document.getElementById("sc");
    const backButton = document.getElementById("gtfc");
    
    nextButton.addEventListener("click", function (event) {
        const inputs = firstColumn.querySelectorAll("input[type='text'], input[type='email']");
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.border = "2px solid red"; 
            } else {
                input.style.border = "";
            }
        });

        if (!isValid) {
            alert("Please fill in all required fields before proceeding.");
            event.stopImmediatePropagation(); 
            firstColumn.style.display = "flex";
            secondColumn.style.display = "none";
            nextButton.style.display = 'flex';
            backButton.style.display = 'none';
            return; 
        }

        
    });

    document.getElementById("signup-form").addEventListener("submit", function (event) {
        const inputs = this.querySelectorAll("input[required]");
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.border = "2px solid red";
            } else {
                input.style.border = "";
            }
        });

        if (!isValid) {
            event.preventDefault();
            alert("Please complete all fields before submitting.");
        }
    });
});document.addEventListener("DOMContentLoaded", function () {
    const nextButton = document.getElementById("gtsc");
    const firstColumn = document.getElementById("fc");
    const secondColumn = document.getElementById("sc");
    const backButton = document.getElementById("gtfc");
    
    nextButton.addEventListener("click", function (event) {
        const inputs = firstColumn.querySelectorAll("input[type='text'], input[type='email']");
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.border = "2px solid red"; 
            } else {
                input.style.border = "";
            }
        });

        if (!isValid) {
            alert("Please fill in all required fields before proceeding.");
            event.stopImmediatePropagation(); 
            firstColumn.style.display = "flex";
            secondColumn.style.display = "none";
            nextButton.style.display = 'flex';
            backButton.style.display = 'none';
            return; 
        }

        
    });

    document.getElementById("signup-form").addEventListener("submit", function (event) {
        const inputs = this.querySelectorAll("input[required]");
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.border = "2px solid red";
            } else {
                input.style.border = "";
            }
        });

        if (!isValid) {
            event.preventDefault();
            alert("Please complete all fields before submitting.");
        }
    });
});

function gtfc(){
    const first_col = document.getElementById("fc");
    const second_col = document.getElementById("sc");
    const button = document.getElementById("gtsc");
    const back_button = document.getElementById("gtfc");

    first_col.style.display = 'flex';
    second_col.style.display = 'none';
    button.style.display = 'flex';
    back_button.style.display = 'none';
}

    
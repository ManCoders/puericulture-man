function gtpds(){
    const dpds = document.getElementById("pds");
    const dc = document.getElementById("c");
    const djd = document.getElementById("jd");
    const dd = document.getElementById("d");
    const dal = document.getElementById("al");
    const dpb = document.getElementById("pb");

    if(dpds.style.display == 'none'){
        dpds.style.display = 'flex'; 
        dc.style.display = 'none'; 
        djd.style.display = 'none'; 
        dd.style.display = 'none'; 
        dal.style.display = 'none'; 
        dpb.style.display = 'none'; 
    }else{
        dpds.style.display = 'none'; 
    }
}
function gtc(){
    const dpds = document.getElementById("pds");
    const dc = document.getElementById("c");
    const djd = document.getElementById("jd");
    const dd = document.getElementById("d");
    const dal = document.getElementById("al");
    const dpb = document.getElementById("pb");

    if(dc.style.display == 'none'){
        dpds.style.display = 'none'; 
        dc.style.display = 'flex'; 
        djd.style.display = 'none'; 
        dd.style.display = 'none'; 
        dal.style.display = 'none'; 
        dpb.style.display = 'none'; 
    }else{
        dc.style.display = 'none'; 
    }
}
function gtjd(){
    const dpds = document.getElementById("pds");
    const dc = document.getElementById("c");
    const djd = document.getElementById("jd");
    const dd = document.getElementById("d");
    const dal = document.getElementById("al");
    const dpb = document.getElementById("pb");

    if(djd.style.display == 'none'){
        dpds.style.display = 'none'; 
        dc.style.display = 'none'; 
        djd.style.display = 'flex'; 
        dd.style.display = 'none'; 
        dal.style.display = 'none'; 
        dpb.style.display = 'none'; 
    }else{
        djd.style.display = 'none'; 
    }
}
function gtd(){
    const dpds = document.getElementById("pds");
    const dc = document.getElementById("c");
    const djd = document.getElementById("jd");
    const dd = document.getElementById("d");
    const dal = document.getElementById("al");
    const dpb = document.getElementById("pb");

    if(dd.style.display == 'none'){
        dpds.style.display = 'none'; 
        dc.style.display = 'none'; 
        djd.style.display = 'none'; 
        dd.style.display = 'flex'; 
        dal.style.display = 'none'; 
        dpb.style.display = 'none'; 
    }else{
        dd.style.display = 'none'; 
    }
}
document.addEventListener("DOMContentLoaded", function () {
    // Highlight PDS button when profile page loads
    const pdsButton = document.getElementById("pdsbtn");
    if (pdsButton) {
        pdsButton.classList.add("active");
    }
});

function setActiveButton(buttonId) {
    document.querySelectorAll(".profiling button").forEach(btn => {
        btn.classList.remove("active");
    });

    document.getElementById(buttonId).classList.add("active");
}
function toggleSection(sectionId) {
    const sections = ["pds", "c", "jd", "d", "al", "pb"];
    
    sections.forEach(id => {
        document.getElementById(id).style.display = (id === sectionId) ? 'flex' : 'none';
    });
}

function gtpds() {
    setActiveButton("pdsbtn");
    toggleSection("pds");
}

function gtc() {
    setActiveButton("dcbtn");
    toggleSection("c");
}

function gtjd() {
    setActiveButton("jdbtn");
    toggleSection("jd");
}

function gtd() {
    setActiveButton("dbtn");
    toggleSection("d");
}

function gtal() {
    setActiveButton("albtn");
    toggleSection("al");
}

function gtpb() {
    setActiveButton("pbbtn");
    toggleSection("pb");
}

function fill_Up(){
    const fill_Up = document.getElementById("fill-up");

    console.log("button click")

    if(fill_Up.style.display == 'none'){
        fill_Up.style.display = 'flex';
    }else{
        fill_Up.style.display = 'none';
    }
}

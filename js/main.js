const donated = document.getElementsByClassName("leaderbord__trees");

function sortMost(){
    for(let i = 0; i < donated.length; i++){
        const donatedArray = donated[i].innerText;
        donatedArray.sort(function(a, b){return a-b});
    }
}

sortMost();

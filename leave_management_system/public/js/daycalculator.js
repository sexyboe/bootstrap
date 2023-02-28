

function calculateDays() {
    var d1 = document.getElementById("day1").value;
    var d2 = document.getElementById("day2").value;    
    const dateOne = new Date(d1);
    const dateTwo = new Date(d2);
let greeting;

const time = Math.ceil(dateTwo - dateOne);

if(time < 1){
    greeting ="Your leave date is ahead of return date. please ";
    alert('date is missmatched');
}
else{
    greeting = Math.ceil(time / (1000 * 60 * 60 * 24));
    if(greeting > 30 ){
        console.log(greeting);

       }


    }
    document.getElementById("total").value = greeting;   


}

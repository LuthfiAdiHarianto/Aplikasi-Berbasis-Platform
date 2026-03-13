function sumOddNumbers(min, max) {

    let sum = 0;
    let numbers = [];

    for (let i = min; i <= max; i++) {

        if (i % 2 !== 0) {
            sum += i;
            numbers.push(i);
        }

    }

    return {
        total: sum,
        sequence: numbers.join("+")
    };
}



let test1 = sumOddNumbers(1,8);
let test2 = sumOddNumbers(4,15);

console.log("min = 1, max = 8, result = " + test1.total + " (" + test1.sequence + ")");
console.log("min = 4, max = 15, result = " + test2.total + " (" + test2.sequence + ")");



function changeAlignment() {

    const textElement = document.getElementById('target-text');
    const currentAlign = textElement.style.textAlign;

    if (currentAlign === 'left') {
        textElement.style.textAlign = 'center';
    }
    else if (currentAlign === 'center') {
        textElement.style.textAlign = 'right';
    }
    else {
        textElement.style.textAlign = 'left';
    }

}



function toggleColor() {

    const box = document.getElementById('target-box');
    box.classList.toggle('color-changed');

}



function showResult(){

    let result1 = sumOddNumbers(1,8);
    let result2 = sumOddNumbers(4,15);

    document.getElementById("result").innerHTML =
        "min = 1, max = 8, result = " + result1.total + " (" + result1.sequence + ")" +
        "<br>" +
        "min = 4, max = 15, result = " + result2.total + " (" + result2.sequence + ")";

}
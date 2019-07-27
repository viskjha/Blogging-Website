console.log('%c My name is vishal ', 'background: #222; color: #bada55');



$(document).ready(function () {
    $("#lo").on("click", function (e) {
        e.preventDefault();
        return false;
    });
}); 



window.console.log = function () {
    console.error('The developer console is temp blocked....');
    window.console.log = function () {
        return false;
    }
}

console.log('test');
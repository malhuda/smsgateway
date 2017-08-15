<input id="info" type="button" value="Customer Info">
<div id="myDiv">
    <form>Name:
        <input type="text" value="" id="name" name="name">
        </input>
    </form>
</div><script>
var button = document.getElementById("info");
var myDiv = document.getElementById("myDiv");

function show() {
    myDiv.style.visibility = "visible";
}

function hide() {
    myDiv.style.visibility = "hidden";
}

function toggle() {
    if (myDiv.style.visibility === "hidden") {
        show();
    } else {
        hide();
    }
}

hide();

button.addEventListener("click", toggle, false);
</script>
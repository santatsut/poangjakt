


 function loadForm() {
    const container = document.getElementsByClassName("FormTdButton");
    const table = document.getElementById("TableForTasks");
    console.log("Hej");
    Array.from(container).forEach((element, index) => {
        let form = document.createElement("form");
        form.method = "post";
        let button = document.createElement("button");
        button.type = "submit";
        button.name = "done";

        // use the Uppgift text from the same row
        let uppgiftCell = table.rows[index+2].querySelector(".UppgiftTd");
        if(!uppgiftCell) return; // safety check
        button.value = uppgiftCell.textContent.trim();
        button.textContent = "Done";

        form.append(button);
        element.append(form);
       
    });
}
function StartAnimationOnScrollPositionFormItems() {

}


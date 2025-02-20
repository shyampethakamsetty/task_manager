function addProgram() {
    var input = document.getElementById("programInput").value;
    if (input) {
        var li = document.createElement("li");
        li.textContent = input;
        var deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.onclick = function() {
            this.parentElement.remove();
        };
        li.appendChild(deleteButton);
        document.getElementById("programList").appendChild(li);
        document.getElementById("programInput").value = "";
    }
}
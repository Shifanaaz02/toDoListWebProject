function activateaddbtn(){
    let taskName = document.getElementById("inputbox").value;
    if(taskName.trim() != 0){
        document.querySelector(".newtask button").classList.add("active");
    }else{
        document.querySelector(".newtask button").classList.remove("active");
    }
}

function activateeditbtn(){
    let taskName = document.getElementById("editbox").value;
    if(taskName.trim() != 0){
        document.querySelector(".edittask button").classList.add("active");
    }else{
        document.querySelector(".edittask button").classList.remove("active");
    }
}

showtasks();

function addtask(){
    let taskName = document.getElementById("inputbox").value;
    let localstoragedata = localStorage.getItem("Name of new task");
    if (localstoragedata== null){
        listArray = [];
    }else{
        listArray = JSON.parse(localstoragedata);
    }
    listArray.push(taskName);
    localStorage.setItem("Name of new task", JSON.stringify(listArray));
    
    showtasks();
    document.querySelector(".newtask button").classList.remove("active");
}

function showtasks(){
    let localstoragedata = localStorage.getItem("Name of new task");
    if (localstoragedata== null){
        listArray = [];
    }else{
        listArray = JSON.parse(localstoragedata);
    }
    var pendingTasksNumber = document.querySelector(".pendingTasks");  //
    pendingTasksNumber.textContent = listArray.length;

    // display list
    let newLiTag = "";
    listArray.forEach((element, index) => {
    newLiTag += `<li>${element}<span class="icon" onclick="editTask(${index})"><i class="fas fa-edit"></i></span><span class="icon" onclick="delTask(${index})"><i class="fas fa-trash"></i></span></li>`;
    });
    document.querySelector(".theList").innerHTML = newLiTag;

    const x = document.querySelector(".newtask input");
    //x = document.getElementById("inputbox").value;
    x.value = "";
}

function delTask(index){
    let localstoragedata = localStorage.getItem("Name of new task");
    listArray = JSON.parse(localstoragedata);
    listArray.splice(index, 1);
    localStorage.setItem("Name of new task", JSON.stringify(listArray));
    
    showtasks();
}

function editTask(index){
    const taskName = document.getElementById("editbox").value;
    let localstoragedata = localStorage.getItem("Name of new task");

    listArray[index] = taskName;
    localStorage.setItem("Name of new task", JSON.stringify(listArray));


    // let localstoragedata = localStorage.getItem("Name of new task");
    // listArray = JSON.parse(localstoragedata);
    // listArray.splice(index, 1);
    // localStorage.setItem("Name of new task", JSON.stringify(listArray));
    
    showtasks();
    const y = document.querySelector(".edittask input");
    y.value = "";
}

function clearAll(){
    listArray = [];
    localStorage.setItem("Name of new task", JSON.stringify(listArray));
    showtasks();
}
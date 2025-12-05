let func1=()=>{
    var ds=["Dung","Anh","Mau","Long","Toan"]

    for(var i=0;i<ds.length;i++){
        console.log(ds[i]);
    }
    var person={
        name:"dung",
        age:20,
        job:"none"
    }
    for(let key in person){
        console.log(key+":"+person[key]);
    }
};
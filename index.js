function isEmptyReg(){
  let l = document.forms["reg"]["login"].value;
  let ps = document.forms["reg"]["password"].value;
  if (l == "" || ps == "") {
    alert("Не все поля заполнены");
    return false;
  }
  return true;
}

function isEmptyAdmin(){
  let foto = document.forms["service"]["foto"].value;
  let name = document.forms["service"]["name"].value;
  let price = document.forms["service"]["price"].value;
  let info = document.forms["service"]["info"].value;

  if (foto == "" || name == "" || price == "" || info == "") {
    alert("Не все поля заполнены");
    return false;
  }
  return true;
}

function isEmptyComment() {
  let comment = document.forms["comments"]["comment"].value;
  if (comment== "" ) {
    alert("Введите комментарий");
    return false;
  }
  return true;
}



//onsubmit="return isEmpty1()" name="reg" 
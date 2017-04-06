var artPool;
function readmore(Article){
	artPool=Article;
	document.getElementById('darkCover').style.display="block";
	document.getElementById('lab_title').innerHTML=Article.title;
	document.getElementById('lab_content').innerHTML=Article.content;
	document.getElementById('reader').style.display="block";
	// document.cookie="article="+id+";";
	// idpool=id;
}
function goback(){
	artPool=null;
	document.getElementById('darkCover').style.display="none";
	document.getElementById('reader').style.display="none";
	// document.cookie="article="+idpool+"; expires=Thu, 01 Jan 1970 00:00:00 GMT";
}
function edit()
{
    //artPool.aid
    document.getElementById('lab_title').innerHTML="<input type='text' value='"+artPool.title+"' name='editTitle' style='width:75%'>";
	document.getElementById('lab_content').innerHTML="<textarea name='editContent'>"+artPool.content+"</textarea>";
	document.getElementById('icon_container').innerHTML="<div class='ui buttons'>"
  	+"<button class='ui button' type='button' onclick='goback()'>Cancel</button>"
  	+"<div class='or'></div>"
  	+"<button class='ui positive button' type='submit'>Save</button>"
	+"</div>"
	+"<input type='hidden' value='"+artPool.aid+"' name='editAid'>";
}
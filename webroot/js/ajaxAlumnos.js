function addClase()
{
		 var originalConcepto=document.getElementById("sprofesor");
		 var nuevoConcepto=originalConcepto.cloneNode(true);
		 nuevoConcepto.getElementsByTagName('div')[0].getElementsByTagName('select')[0].id ="profesores";
// 		 alert(nuevoConcepto.getElementsByTagName('div')[0].getElementsByTagName('select')[0].id);
		 destino=document.getElementById("div-clases");
		 destino.appendChild(nuevoConcepto);

		 var originalConcepto=document.getElementById("sdisciplina");
		 var nuevoConcepto=originalConcepto.cloneNode(true);
		 nuevoConcepto.getElementsByTagName('select')[0].id ="disciplinas";
// 		 alert(nuevoConcepto.getElementsByTagName('select')[0].id);
		 destino=document.getElementById("div-clases");
		 destino.appendChild(nuevoConcepto);

		 var originalConcepto=document.getElementById("shorario");
		 var nuevoConcepto=originalConcepto.cloneNode(true);
		 nuevoConcepto.getElementsByTagName('div')[0].getElementsByTagName('select')[0].id = "clases";
// 		 alert(nuevoConcepto.getElementsByTagName('div')[0].getElementsByTagName('select')[0].id);
		 destino=document.getElementById("div-clases");
		 destino.appendChild(nuevoConcepto);

		 var s1 = document.getElementById('profesores');
		 var s2 = document.getElementById('disciplinas') ;
		 var s3 =  document.getElementById('clases');
		
		 s1.id = (s1.id+1);
		 s2.id = (s2.id+1)
		 s3.id = (s3.id+1)
}
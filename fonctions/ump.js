
	var ie = false;	/*@cc_on	ie = true;	@*/
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function UMPAjout(ou,nameFichiers)	//~~~~ ajout "input text" ~~~~
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	/*	UMPAjout(	o� ins�rer les input text [ le formulaire en g�n�ral ] ,
						name des input file pour traitement PHP	)	*/
   {	var d=document.createElement("div");
	
		var i=document.createElement("input");	// ajout input file
		i.type="text";
		i.name=nameFichiers+"[]"
		i.size=35;
		if (ie)	i.dir="rtl";	// beau avec IE, pas avec les autres navigateurs
		d.appendChild(i);
		
		var b=document.createElement("input");	// ajout du bouton pour supprimer
		b.type="button";
		b.value="Supprimer";
		b.onclick=function()	{	this.parentNode.style.display="none";
										this.parentNode.innerHTML="";	}
		d.appendChild(b);
		
		ou.appendChild(d);							// ajout (input file + bouton) l� o� il faut.
   }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function UMPControle(frm,nameFichiers)	//~~~~ contr�le des input file ~~~~
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	/*	UMPControle(	le formulaire ,
							name des input file	)	*/
{	var ne=0;
	for ( var e=0;e<frm.elements.length;e++ )
	{	if (frm.elements[e].name==nameFichiers+"[]")
		{	ne++;
			if (frm.elements[e].value.length==0)
			{	alert("Copie ("+ne+") non saisie");
				return false;
			}
			ns=ne;
			for ( var s=e+1;s<frm.elements.length;s++ )
			{	if (frm.elements[s].name==nameFichiers+"[]")
				{	ns++;
					if (frm.elements[e].value==frm.elements[s].value)
					{	alert("Fichier ("+ne+") en double ("+ns+")\r\n"+frm.elements[s].value);
						return false;
					}
				}
			}
		}
	}
	return true;
}

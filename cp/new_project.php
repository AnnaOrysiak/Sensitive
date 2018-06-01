<?php $author=$_SESSION['author']; ?>

<html>
    <head>
        <title>Wizualny edytor</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        
       <?php include "scripts/edytor_tekstu.js"; ?>
        

    </head>
 <body onload="load();">
        <form action="cp/add_project.php" method="POST" id="editor">		
			<div id="editorImportant">	

			<div id="editorCategories">
			<p>Kategorie</p>
			<label>
			  <input type="radio" name="category" value="Opowiadanie"> Opowiadanie 
			  </label><br />
			  <label>
				<input type="radio" name="category" value="One-shot"> One-shot 
			  </label><br />
			  <label>
				<input type="radio" name="category" value="FanFic"> FanFic 
			  </label><br />
				<label>
				<input type="radio" name="category" value="Wiersz"> Tom wierszy
			  </label>
			</div>

			<div id="editorAuthors">
			<p>Autorzy</p>
                        
			<?php 
                            include "connected.php";
                            $question= "SELECT DISTINCT author FROM uzytkownicy ORDER BY author";
                            $result=$db->query($question);
                            $how_many=$result->num_rows;

                            for($i=0; $i<$how_many; $i++) {
                                    $line=$result->fetch_assoc();
                                    echo " <label><input type='checkbox' name='author[]' value=".$line['author']."> ".$line['author']." </label><br />";		
                            }			
			?>
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<input type="text" name="chapterTitle" placeholder="Tytuł Opowiadania" onfocus="this.placeholder=''" onblur="this.placeholder='Tytuł Opowiadania'" /><br />
		<input type="text" name="chapterTitle" placeholder="Tytuł Rozdziału" onfocus="this.placeholder=' '" onblur="this.placeholder='Tytuł Rozdziału'" /><br />
            <textarea name="text">Tu wpisz <strong>swój</strong> tekst</textarea>
            <iframe src="cp/editor.html" frameborder="0" id="edytor">
                Masz za starą przeglądark, aby móc korzystać z tego edytora.
            </iframe>
			<br />
            <div class="editorFunctions">
                <button type="button" onclick="command('bold', null)"><strong>B</strong></button>
                <button type="button" onclick="command('italic', null)"><i>I</i></button>
		<button type="button" onclick="command('underline', null)"><u>U</u></button>
                
                <button type="button" onclick="command('indent', null)"><span style="font-size: 14px;"><i class="icon-indent-right"></i></span></button>
                <button type="button" onclick="command('outdent', null)"><span style="font-size: 14px;"><i class="icon-indent-left"></i></span></button>
                
                <button type="button" onclick="command('JustifyCenter', null)"><span style="font-size: 14px;"><i class="icon-align-center"></i></span></button>
                <button type="button" onclick="command('justifyfull', null)"> <span style="font-size: 14px;"><i class="icon-align-justify"></i></span></button>
                <button type="button" onclick="command('justifyleft', null)"><span style="font-size: 14px;"><i class="icon-align-left"></i></span></button>
                <button type="button" onclick="command('justifyright', null)"><span style="font-size: 14px;"><i class="icon-align-right"></i></span></button>

                
                <button type="button" onclick="url = prompt('Wprowadź url obrazka', ''); if(url != '' && url != null) command('InsertImage', url);"><span style="font-size: 14px;"><i class="icon-picture"></i></span></button>
            </div>
<br />			
            <div id="editorOptions">
                <div style="float:left;"> 
                    <button type="button" onclick="viewHTMLcode()" id="viewHTML"><span style="font-size:18px;">Pokaż źródło</span></button>
                    <button type="button" onclick="backview()" style="display: none;" id="back"><span style="font-size:18px;">Wróć</span></button> 
                </div>
                <div style="float: right;">
                    <button type="button" onclick="minus()"><span style="font-size:20px; font-weight:700;">&nbsp;-&nbsp; </span></button>
                    <button type="button" onclick="plus()"><span style="font-size:20px; font-weight:700;">&nbsp;+&nbsp; </span></button>
                </div>
            </div><br />
            <div id="editorContainer">
                <input type="button" value="Wyślij" onclick="if(document.getElementById('back').style.display = 'none') viewHTMLcode();submit()" />
            </div>
	
        </form>

    </body>
</html>
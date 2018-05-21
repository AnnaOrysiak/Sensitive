 <script type="text/javascript">
            var ie = navigator.appName == "Microsoft Internet Explorer";
            function command(id, value) {
                if(ie)
                    parent.document.frames["edytor"].document.execCommand(id,false,value);
                else
                    parent.document.getElementById('edytor').contentDocument.execCommand(id,false,value);
                document.getElementById("edytor").style.height = "400px";
            }
            
            function load() {
                if(ie)
                    parent.frames["edytor"].document.body.innerHTML = document.getElementById("editor").text.value;
                else
                    parent.document.getElementById("edytor").contentDocument.body.innerHTML = document.getElementById("editor").text.value;
                backview();
            }
            
            function plus() {
            document.getElementById("edytor").style.height = document.getElementById("edytor").clientHeight + 1000 + 'px';
            document.getElementById("editor").text.style.height = parseFloat(document.getElementById("editor").text.offsetHeight) + 1000 + 'px';
            }
            
            function minus() {
                
                    temp = parseFloat(document.getElementById("editor").text.offsetHeight) - 1000;
                    document.getElementById("editor").text.style.height = temp + "px";
                    document.getElementById("edytor").style.height = document.getElementById("edytor").clientHeight - 1000 + 'px';
                
            }
            
            function viewHTMLcode() {
                if(ie)
                    document.getElementById("editor").text.value = parent.frames["edytor"].document.body.innerHTML;
                else
                    document.getElementById("editor").text.value = parent.document.getElementById("edytor").contentDocument.body.innerHTML;
                document.getElementById("edytor").style.display = 'none';
                document.getElementById("back").style.display = 'block';
                document.getElementById("viewHTML").style.display = 'none';
                document.getElementById("editor").text.style.display = 'block';
                document.getElementById("editor").text.style.height = document.getElementById("edytor").style.height;
            }
            
            function backview() {
                if(ie)
                    parent.frames["edytor"].document.body.innerHTML = document.getElementById("editor").text.value;
                else
                    parent.document.getElementById("edytor").contentDocument.body.innerHTML = document.getElementById("editor").text.value;
                document.getElementById("edytor").style.display = 'block';
                document.getElementById("back").style.display = 'none';
                document.getElementById("viewHTML").style.display = 'block';
                document.getElementById("editor").text.style.display = 'none';
                document.getElementById("edytor").style.height = document.getElementById("editor").text.style.height;
            }

                backview();

            
        </script>
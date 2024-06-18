<div>
    <div>
        @php
            $typel = $getRecord()::class;
            if(preg_match("/service/i", $typel)){
                $typel = "/services";
            }
            if(preg_match("/projet/i", $typel)){
                $typel = "/projets";
            }
        @endphp
        <div class="flex items-center">
            @if($getRecord()->boutonlien)
                <a class="flex" href="#" onclick="copyUrlToClipboard('{{ asset($typel.$getRecord()->boutonlien) }}'); event.preventDefault();" class="text-indigo-600 hover:text-indigo-900">
                <svg fill="#000000" height="20px" width="20px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 362 362" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 362 362">
                    <g>
                        <path d="m214,266h-204c-5.523,0-10,4.477-10,10v64c0,5.523 4.477,10 10,10h204c5.522,0 10-4.477 10-10v-64c0-5.523-4.478-10-10-10zm-10,64h-184v-44h184v44z"/>
                        <path d="m352,12h-342c-5.523,0-10,4.477-10,10v64c0,5.523 4.477,10 10,10h342c5.522,0 10-4.477 10-10v-64c0-5.523-4.478-10-10-10zm-10,64h-322v-44h322v44z"/>
                        <path d="m352,109.25h-204c-5.523,0-10,4.477-10,10v122.75c0,5.523 4.477,10 10,10h204c5.522,0 10-4.477 10-10v-122.75c0-5.523-4.478-10-10-10zm-10,122.75h-184v-102.75h184v102.75z"/>
                        <path d="M10,252h98.436c5.523,0,10-4.477,10-10V119.25c0-5.523-4.477-10-10-10H10c-5.523,0-10,4.477-10,10V242   C0,247.523,4.477,252,10,252z M20,129.25h78.436V232H20V129.25z"/>
                        <path d="m352,266h-102c-5.522,0-10,4.477-10,10v64c0,5.523 4.478,10 10,10h102c5.522,0 10-4.477 10-10v-64c0-5.523-4.478-10-10-10zm-10,64h-82v-44h82v44z"/>
                        <path d="m179,172.625h142c5.522,0 10-4.477 10-10s-4.478-10-10-10h-142c-5.523,0-10,4.477-10,10s4.477,10 10,10z"/>
                        <path d="m179,208.625h142c5.522,0 10-4.477 10-10s-4.478-10-10-10h-142c-5.523,0-10,4.477-10,10s4.477,10 10,10z"/>
                        <path d="m83.967,155.876c-3.905-3.905-10.237-3.905-14.143,0l-10.606,10.606-10.606-10.606c-3.905-3.905-10.237-3.905-14.143,0s-3.905,10.237 0,14.143l10.606,10.606-10.606,10.606c-3.905,3.905-3.905,10.237 0,14.143 1.953,1.953 4.512,2.929 7.071,2.929s5.119-0.976 7.071-2.929l10.606-10.606 10.606,10.606c1.953,1.953 4.512,2.929 7.071,2.929s5.119-0.976 7.071-2.929c3.905-3.905 3.905-10.237 0-14.143l-10.605-10.606 10.606-10.606c3.906-3.906 3.906-10.238 0.001-14.143z"/>
                    </g>
                </svg>
                &nbsp;Copié lien
                </a>
            @endif
        </div>
    </div>
</div>
<script>
    function copyUrlToClipboard(url) {
        var furl = url.replaceAll("{{$typel.''.$typel}}", "{{$typel}}");
        // Create a temporary input element
        var tempInput = document.createElement("input");
        // Append it to the body
        document.body.appendChild(tempInput);
        // Set the value of the input
        tempInput.value = furl;
        // Select the input value
        tempInput.select();
        // Copy the value to the clipboard
        document.execCommand("copy");
        // Remove the input element from the body
        document.body.removeChild(tempInput);
        // Optional: Show a success message
        if(furl.includes(".html"))
            alert("Lien copié avec succès !");
        else
            alert("Lien est invalide, définissez le lien de la page ! ex:");
    }
</script>
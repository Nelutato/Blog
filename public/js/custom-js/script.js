var counter=0;
    function addIngredient()
    {
        counter++;
        var addList = document.getElementById('ingredients');
        var text = document.createElement('input');
        text.type = "text";
        text.name = "ingredients["+ counter+"]";
        // + counter
        addList.appendChild(text);
    }
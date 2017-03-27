function GithubForm( config )
{
    this._config = config;
    
    this._api;
    this._messages;
    this._form;
    this._repository;
    this._author;
    this._title;
    this._text;
    this._submit;

    this.startup = function()
    {
        this._api = this._config.api;
        
        this._messages = document.getElementById( this._config.formRefId.messages );
        this._form = document.getElementById( this._config.formRefId.form );
        this._repository = document.getElementById( this._config.formRefId.repository );
        this._author = document.getElementById( this._config.formRefId.author );
        this._title = document.getElementById( this._config.formRefId.title );
        this._text = document.getElementById( this._config.formRefId.text );
        this._submit = document.getElementById( this._config.formRefId.submit );
        
        this._form.onsubmit = function(){ return this.onSubmit(); }.bind( this );
        
        this.loadRepositories();
    };
    
    this.loadRepositories = function()
    {
        this._api.getAll( function( response ) {
            
            for( var id in response )
            {
                this._repository.innerHTML += "<option value=\""+id+"\">"+response[id].name+"</option";
            }
            
        }.bind( this ) )
    };
    
    this.onSubmit = function()
    {
        this._api.create( {
            "repository" : this._repository.value,
            "author" : this._author.value,
            "title" : this._title.value,
            "text" : this._text.value
        }, 
        function( response ) { this.onSubmitted( response ); }.bind( this ),
        function( response ) { this.onError( response ); }.bind( this ) );
        
        //Supress form submit
        return false;
    };
    
    this.onSubmitted = function( response )
    {
        this._messages.setAttribute( "class", "alert alert-success" );
        this._messages.innerHTML = "Issue created:" + response.html_url;        
        
        this._author.value = "";
        this._title.value = "";
        this._text.value = "";
    };
    
    this.onError = function( response )
    {
        this._messages.setAttribute( "class", "" );
        this._messages.innerHTML = "";
        
        alert = "";
        text = "";
        
        switch( response.code )
        {
            case 400 :
                alert = "alert alert-warning";
                text += "<ul>";
                
                for( var field in response.response )
                {
                    for( var error in response.response[field] )
                    {
                        text += "<li>"+ field + ": " + response.response[field][error] + "</li>";
                    }
                }
                text += "</ul>";
                break;
            case 500 :
                alert = "alert alert-danger";
                text = response.response.exception + ": " + response.response.message;
                break;
                
        }
        this._messages.setAttribute( "class", alert );        
        this._messages.innerHTML = text;
    };
}
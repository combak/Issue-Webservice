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
        
        this._form.onsubmit = function(){
            this.onSubmit();
            console.log("test");
            //Supress submit
            return false;
        }.bind( this );
        
        this.loadRepositories()
    };
    
    this.loadRepositories = function()
    {
        this._api.getAll( function( response ) {
            
            for( id in response )
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
        }, function( response ){
            console.log( response );
        }, function( response ){
            console.error( response );
        } );
    };
}
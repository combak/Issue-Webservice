function GithubApi( apiUrl )
{
    this._apiUrl = apiUrl;

    /**
     * Get all allowed repositories
     * 
     * @param {function} callback
     * @param {function} error
     */
    this.getAll = function( callback, error )
    {
        //Request Object
        xhr = new XMLHttpRequest();
        
        //Connection settings
        xhr.open( "GET", this._apiUrl, true );
        xhr.setRequestHeader( "Accept", "application/json" );
        
        //Callback
        xhr.onload = function()
        {   
            //HTTP OK
            if( xhr.status === 200 )
            {
                callback( JSON.parse( xhr.responseText ) );
            }
            else //Something wrong
            {
                error( { 
                    "code"      : xhr.status, 
                    "message"   : xhr.statusText, 
                    "response"  : JSON.parse( xhr.responseText ) 
                });
            }   
        };
        xhr.send( null );
    };

    /**
     * Create Issue
     * 
     * @param {Object} value
     * @param {function} callback
     * @param {function} error
     */
    this.create = function( value, callback, error )
    {
        //Request Object
        xhr = new XMLHttpRequest();
        
        //Connection settings
        xhr.open( "POST", this._apiUrl, true );
        xhr.setRequestHeader( "Accept", "application/json" );
        xhr.setRequestHeader( "Content-Type", "application/json" );       
        
        //Callback
        xhr.onload = function()
        {   
            //HTTP Created
            if( xhr.status === 201 )
            {
                callback( JSON.parse( xhr.responseText ) );
            }
            else //Something wrong
            {
                error( { 
                    "code"      : xhr.status, 
                    "message"   : xhr.statusText, 
                    "response"  : JSON.parse( xhr.responseText ) 
                });
            }   
        };
        xhr.send( JSON.stringify( value ) );        
    };
}
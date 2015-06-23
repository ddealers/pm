PM Services

Wordpress Canal 5 Post Service 
Endpoint	/api/posts	
HTTP Method	GET	
Sample request	curl -i -X GET http://localhost/api/posts?postType=page&startDate=2012-06-14&endDate=2014-06-14&order=title&orderDir=ASC&maxResults=4999&program=Actitud%20PM
	http://localhost/api/posts?postType=page&date=2013-10-10
Query string parameters	postType: string (optional)	
	typePost: string (optional)	
	date: “yyyy-MM-dd” (optional)	
	startDate: “yyyy-MM-dd” (optional)	
	endDate: “yyyy-MM-dd” (optional)	
	order: string (optional)	Any field in PM\Vo\Post
	program: string (optional)	
	orderDir: string (optional)	ASC or DESC
	maxResults: number: (optional)	0-5000
Response Codes	200 OK
404 NOT FOUND
500 SERVER ERROR (not yet)	
Response Body	Array of PM\Vo\Post

* ISO Date Format =
Wordpress Canal 5 Search post by id Service 
Endpoint	/api/posts/{id}	
HTTP Method	GET	
Sample request	curl -i -X GET http://localhost/api/posts/pm
Query string parameters	Not applicable
Validations	None
Response Codes	200 OK
404 NOT FOUND
500 SERVER ERROR (not yet)	
Response Body	Object of type PM\Vo\Post


Wordpress Canal 5 User Registration Service 
Endpoint	/api/users	
HTTP Method	POST	
Sample request	 curl -i -X POST -d '{"address":"Tripoli 104-303 Portales","appKey":"871987239821739821","nick":"dcisse_87","email":"cisse2@creaphiks.com","password":"123456789","passwordConfirm":"123456789","type":"normal","fbToken":"89787987-GHJGJHGJ","fbId":"879898798798779898","twToken":"657657-JGHJGJHJHS==","fName":"Abdoul","lName":"Cisse","file":"=2187389123","sex":"man","age":"18","urlFb":"http://facebook.com/8989","urlTw":"http://twitter.com/9892","extNumber":"104","intNumber":"303","suburb":"Portales","mun":"Benito Juarez","state":"Distrito Federal","cp":"03100","phone":"56889999"}'  http://localhost/api/users
Query string parameters	Not applicable
Validations	See http://userservices.victoria-kitchen.com/docs/classes/Models.UserModel.html#method_register
Verifies if user already exists in database with same nick or email.
Response Codes	201 CREATED
400 BAD_REQUEST
409 CONFLICT
500 SERVER ERROR (not yet)	
Response Body	If errors present PM\Vo\ErrorResult	


Wordpress Canal 5 Post Service 
Endpoint	/api/auth
HTTP Method	POST
Sample request	 curl -i -X POST -d '{"nick":"dcisse_86","password":"123456789"}' http://localhost/api/auth
Query string parameters	Not applicable
Response Codes	403 FORBIDDEN
200 OK
500 SERVER ERROR (not yet)	
Response Body	OAuth Token (not yet)	


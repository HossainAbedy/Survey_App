export default class Gate{

    constructor(user){
        this.user = user;
    }


    isAdmin(){
        return this.user.user_type === 'admin';
    }

    isUser(){
        return this.user.user_type === 'user';
    }
    isAdminOrAuthor(){
        if(this.user.user_type === 'admin' || this.user.user_type === 'surveyor'){
            return true;
        }

    }
    isAuthorOrUser(){
        if(this.user.user_type === 'user' || this.user.user_type === 'surveyor'){
            return true;
        }

    }



}
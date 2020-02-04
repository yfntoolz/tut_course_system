var aps_score;
var email_address;
var english;
var mathematics;
var physics;

function capture(email,aps,eng,math,phy){

    this.aps_score = aps;
    this.email_address = email;
    this.english = eng;
    this.mathematics = math;
    this.physics = phy

}

function get_student() {
    return this.aps_score;
}
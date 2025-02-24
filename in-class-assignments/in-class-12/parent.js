function messageGen() {
    let msg = "Original message"
    function getMsg(){
        console.log(msg);
    }
    msg += " and new message"
    return getMsg;
}

const message1 = messageGen();
message1();
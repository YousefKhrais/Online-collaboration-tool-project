let videoBox = document.getElementById("roomVideoPage");
// let
window.Vue = require("vue").default;

const app = new Vue({
    el:"#chatRoomPage",
    data:{
        ide:null,
        chatRoom:null,
        drawingTool:null,
        editor:null,
    },
    methods:{
        showVideo(){
            console.log("show video clicked");
            this.chatRoom.style.display = "block";
            this.ide.style.display = "none";
            this.drawingTool.style.display = "none";
            this.editor.style.display = "none";
        }
        ,
        showIDE(){
            console.log("show video clicked");
            this.chatRoom.style.display = "none";
            this.drawingTool.style.display = "none";
            this.editor.style.display = "none";
            this.ide.style.display = "block";
        },
        showDrawingPane(){
            this.chatRoom.style.display = "none";
            this.editor.style.display = "none";
            this.drawingTool.style.display = "block";
            this.ide.style.display = "none";
        },
        showEditor(){
            this.chatRoom.style.display = "none";
            this.drawingTool.style.display = "none";
            this.ide.style.display = "none";
            this.editor.style.display ="block";
        }
    },

    mounted(){
        this.ide = document.getElementById("chePage");
        this.chatRoom = document.getElementById("roomVideoPage");
        this.drawingTool =  document.getElementById("drawingPage");
        this.editor = document.getElementById("interactiveEditor");
        console.log("start chat page");
    }

});

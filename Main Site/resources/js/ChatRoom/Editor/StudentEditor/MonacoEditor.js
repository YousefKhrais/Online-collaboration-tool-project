import  {editor} from "monaco-editor";
import {intToHex} from "vuetify/src/util/colorUtils";

class  Editor{

    constructor(){
       this.editor = editor.create(
           {language:"python"}
           );
    }

    init(){

    }

    getEditor(){
        return this.editor;
    }

    setEditor(editor){
        this.editor = editor
    }

}

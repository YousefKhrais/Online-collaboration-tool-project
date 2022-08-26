import {editor  } from "monaco-editor";
import {EditorContentManager,RemoteCursorManager,RemoteSelectionManager} from "@convergencelabs/monaco-collab-ext";
import AgoraRTM  , {RtmClient} from "agora-rtm-sdk";

let APP_ID  ='f51d08c64e5c4e8db52f31f5235ef3e0';
let token = null;
let client; //
let roomID = "room"
let name = "my name";
let editorChannel;
let userName = "username";
let  uid = String(Math.floor(Math.random()*10000));
let UserColors={}

let init = async()=>{
    client =AgoraRTM.createInstance(APP_ID);
    await client.login({uid,token});
    editorChannel = await client.createChannel(roomID);
    await editorChannel.join();

    await client.addOrUpdateLocalUserAttributes({name:userName});

    editorChannel.on('ChannelMessage',handelUserMessage);
    editorChannel.on('MemberJoined',handleJoin);

    editorChannel.on("MemberLeft",handleLeft);
    document.getElementById("changeColors").addEventListener("click",applyColorsChanges);
    await fetchMembers();
}

let fetchMembers = async ()=>{
    console.log("get current active members ");
    let users_ids= await editorChannel.getMembers();
    console.log(users_ids);

        for(let i =0; i<users_ids.length;i++){
            let uid = users_ids[i];
            console.log("fetched user")
            console.log(uid)
            UserColors[uid]='gray';
            console.log("user colors dict ");
            console.log(UserColors)
            let {name} = await client.getUserAttributesByKeys(uid,["name"]);

            let member =`    <div class="member" id="${uid}">
            <h4 >${name}</h4>
            <input type="color" id="user-${uid}-color" name="color">
             <input type="hidden" id="userID" value="${uid}">
        </div>`;
            document.getElementById("membersBox").insertAdjacentHTML('afterbegin',member);
        }

}
init();

let handleJoin =async (id)=>{
    UserColors[id]='gray';
    console.log("user colors dict ");
    console.log(UserColors)
    let {name} = await client.getUserAttributesByKeys(id,["name"]);
    let member =`    <div class="member" id="${id}">
            <h4 >${name}</h4>
            <input type="color" id="user-${id}-color" name="color">
             <input type="hidden" id="userID" value="${id}">
        </div>`;

    document.getElementById("membersBox").insertAdjacentHTML('afterbegin',member);

    //add member to colors set
}

let handleLeft =async (id)=>{
    console.log("member left")
    console.log(id)
    let member = document.getElementById(`${id}`);

    await member.remove();

    delete UserColors[id];
    console.log("delete user left")
    console.log(UserColors);
}

let e= editor.create(
    document.getElementById("editor"),{
        value: ['function x() {', '\tconsole.log("Hello world!");', '}'].join('\n\n\n\n\n'),
        language: 'javascript',
    });

let sendToOthers = ()=>{
    let code = e.getValue();
    editorChannel.sendMessage(
        {
            text:JSON.stringify({    'type':'updateCode',
                'code':code
            })
        }
    );
}

let sendToOthersAction = {
    id: "Send-To-Others",
    label: "Send Code To Others",
    contextMenuOrder: 0,
    contextMenuGroupId: "operation",
    run: sendToOthers,
}

let syncronizeSelection = ()=>{
    let selection = e.getSelection();
    console.log(selection);
    //
    // let startPosistion = selection.getStartPosition();
    // let endPosistion = selection.getEndPosition();
    //
    // console.log(startPosistion);
    // console.log(endPosistion);

    editorChannel.sendMessage(
        {
            text:JSON.stringify({    'type':'addSelection',
                // 'start':startPosistion,
                // 'end':endPosistion,
                selection:selection,
                sender:userName
            })
        }
    );
}

let synconizeSelectionAction = {
    id: "Syncronize-Selection",
    label: "Syncronize Selection",
    contextMenuOrder: 1,
    contextMenuGroupId: "operation",
    run: syncronizeSelection,
}

let ResetCode = ()=>{
    let code = e.getValue();
    e.setValue(code);
}

let ResetCodeAction=  {
    id: "Reset-Code",
    label: "Reset Coce",
    contextMenuOrder: 2,
    contextMenuGroupId: "operation",
    run: ResetCode,
}

e.addAction(sendToOthersAction)
e.addAction(synconizeSelectionAction);
e.addAction(ResetCodeAction);
let handelUserMessage = async (message,senderID)=>{
    let data = JSON.parse(message.text);
    if(data.type==="updateCode"){
        e.setValue(data.code)
        console.log(data)
    }

    if(data.type === 'addSelection'){
        // let start = data.start;
        // let end = data.end;
        // console.log(data.start);
        // console.log(data.end);

        console.log("list of selections ");
        console.log(data.selection);

        let selectionData = data.selection;
        let selectionManager =new RemoteSelectionManager({editor:e});
        let color = UserColors[senderID];
        console.log("color user")
        console.log(color)
        let selection = selectionManager.addSelection(data.sender, color,data.sender);

        // selection.setOffsets(selectionData.offset())
        selection.setPositions(
            {
                lineNumber:selectionData.startLineNumber,
                column:selectionData.startColumn
            },
            {
                lineNumber:selectionData.endLineNumber,
                column:selectionData.endColumn
            }
        );
        selection.show();

        // selection.setOffsets()

        // selection.setPositions(data.sender,{
        //     lineNumber:start.lineNumber,
        //     column:start.column,
        //     },
        //     {
        //         lineNumber:end.lineNumber,
        //         column:end.column,
        //     }
        // );

        // selection.show();

        // e.setSelection({
        //     startLineNumber:start.lineno ,
        //     startColumn:start.startColumn,
        //     endColumn:end.startColumn,
        //     endLineNumber:end.startLineNumber
        // })

    }

}


let applyColorsChanges = async ()=>{
    // UserColors.forEach((id,color)=>{
    //     console.log("id")
    //     console.log(id)
    //     console.log("color")
    //     console.log(color)
    // })
    for(const [id,color] of Object.entries(UserColors)){
            let userColor  = document.getElementById(`user-${id}-color`).value;
            UserColors[id] = userColor;
    }
    console.log("user colors");
    console.log(UserColors);
}
let leave = async()=>{
    await editorChannel.leave();
    await client.logout();
}
window.addEventListener("beforeunload",leave);

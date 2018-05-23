export default {
	data(){
		return {
			inbox: [],
			authUser: window.User,
			chat: [],
			form: {},
			isSending: false,
			users: [],
			inboxList: true,
			memberList: false,
			chatList: false
		}
	},
	mounted(){
		this.fetchInbox()
		setInterval(() => this.getChat(), 5 * 1000 )
		this.getUsers()
	},
	methods: {
		fetchInbox(){
			axios.get('/pt-v1/manage/messages').then(res => {
				this.inbox = res.data
			})
		},
		directChat(data){
			this.chat = data.messages
			if(data.last[0].from_user_id == this.authUser.id && data.last[0].to.id != this.authUser.id){
				this.form = data.last[0].to
			}else{
				this.form = data.last[0].from
			}
			this.inboxList = false
			this.memberList = false
			this.chatList = true
		},
		clickUser(data){
			this.chat = []
			this.form = data
			this.inboxList = false
			this.memberList = false
			this.chatList = true
		},
		send(){
			this.form.user_id = this.form.id
			this.isSending = true
			axios.post('/pt-v1/manage/messages', this.form).then(res => {
				this.isSending = false
				this.form.message = ''
				 this.getChat()
			}).catch(error => {
				this.isSending =false
				console.log(error.response.data)
			})
		},
		getChat(){
			axios.get('/pt-v1/manage/chats/' + this.form.id).then(res => {
				this.chat = res.data
			})
		},
		getUsers(){
			axios.get('/pt-v1/manage/users').then(res => {
				this.users = res.data
			})
		},
		newMessage(){
			this.inboxList = false
			this.memberList = true
			this.chatList = false
		},
		clickInbox(){
			this.chatList = false
			this.memberList = false
			this.inboxList = true
		}
	}
}
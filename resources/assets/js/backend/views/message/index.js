export default {
	data(){
		return{
			model: [],
			form: {},
			inbox: [],
			chat: [],
			isSending: false,
			inboxList: true,
			memberList: false,
			chatList: false
		}
	},
	mounted(){
		this.fetchInbox()
		setInterval(() => this.getChat(), 5 * 1000)
	},
	methods: {
		fetchInbox(){
			axios.get('/md-vs2/manage/messages/inbox').then(res => {
				this.inbox = res.data
				this.fetchUser()
			})
		},
		fetchUser(){
			axios.get('/md-vs2/manage/message/users').then(res => {
				this.model = res.data
			})
		},
		directChat(data){
			this.chat = data.messages
			if(data.last[0].from_user_id == this.authUser.id && data.last[0].to.id != this.authUser.id){
				this.form = data.last[0].to
			}else{
				this.form = data.last[0].from
			}
			this.memberList = false
			this.inboxList = false
			this.chatList = true
		},
		clickUser(data){
			this.chat = {}
			this.form = data
			this.memberList = false
			this.inboxList = false
			this.chatList = true
		},
		send(){
			this.form.user_id = this.form.id
			this.isSending = true
			axios.post('/md-vs2/manage/messages', this.form).then(res => {
				this.isSending = false
				this.form.message = ''
				this.getChat()
			})
		},
		getChat(){
			axios.get('/md-vs2/manage/messages/' + this.form.id).then(res => {
				this.chat = res.data
			})
		},
		newMessage(){
			this.inboxList = false
			this.memberList = true
			this.chatList = false
		}
	},
	computed: {
		url(){
			return this.$store.state.url
		},
		authUser(){
			return this.$store.state.auth_user
		}
	}
}
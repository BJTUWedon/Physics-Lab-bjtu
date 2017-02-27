
	var whole=new Vue({
		//el:".position_rel",
		el:".main",
		data:{
			w:0,
			process:null
		},
		//even many target share one className, only one can be operate by the following function!
		//Suck Vue!
		methods:{
			cover:function(){
				//this.cover_status="block";
				var Node=event.currentTarget.getElementsByClassName('dark_cover')[0];
				Node.style.display="block";
				//console.log(Node);
				clearInterval(this.process);this.w=0;
				//console.log(event.currentTarget.getElementsByTargetName('div'));
				this.process=setInterval(function(){whole.span(Node)},1);
				},
			uncover:function(){
				var Node=event.currentTarget.getElementsByClassName('dark_cover')[0];
				Node.style.display="none";
			},
			span:function(Node){
				this.w+=2;
				Node.style.width=(this.w+"%");
				//console.log(Node.style.width);
				//console.log(this.w/100.0);
				if(this.w==100){
					this.w=0;
					clearInterval(this.process);
					//console.log(this.process);
				}
			}
		}
	});
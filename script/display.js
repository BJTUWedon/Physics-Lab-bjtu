window.onload=function(){
	var display=new Vue({
	el:".main",
	data:{
		img_arr:[{src:"image/display/1.jpg",title:"滑动变阻器探究",status:"img_controls_selected"},{src:"image/display/2.jpg",title:"油滴实验",status:"img_controls"},{src:"image/display/3.png",title:"认识光污染",status:"img_controls"},{src:"image/display/4.png",title:"大气对光的折射效果",status:"img_controls"}],
		count:0,
		mini_time:0,
		w:0,
		process1:null,
		process2:null
	},
	methods:{
		dis_img:function()
		{
			setInterval(function(){display.change();},2400);
			//Fail: setInerval(function(){this.change();},2000);
		},
		change:function()
		{
			this.img_arr[this.count].status="img_controls";
			// this.mini_time=100;
			// this.process1=setInterval(function(){display.disappear()},2);
			//clearInterval(yes);
			this.count=(this.count+1)%this.img_arr.length;//change image
			this.mini_time=60;
			this.process1=setInterval(function(){display.show();},1);
			//clearInterval(no);
			this.img_arr[this.count].status="img_controls_selected";
			//show process1 and disapear process1 can exit at the same time.
			//so they will effect each other!!
			//that why usually other use many <img> at the same time to avoid the opration on the same element
			
		},
		show:function(){
			this.mini_time++;
			//console.log(this.mini_time);
			document.getElementById('img_src').style.opacity=(this.mini_time/100.0);
			if(this.mini_time==100)
			{
				//console.log(true);
				clearInterval(this.process1);
			}
		},
		disappear:function(){
			this.mini_time--;
			//console.log(this.mini_time);
			document.getElementById('img_src').style.opacity=(this.mini_time/20.0);
			if(this.mini_time==0)
			{
				//console.log(false);
				clearInterval(this.process1);

			}
		},
		cover:function(){
				//this.cover_status="block";
				var Node=event.currentTarget.getElementsByClassName('dark_cover')[0];
				Node.style.display="block";
				//console.log(Node);
				clearInterval(this.process2);this.w=0;
				//console.log(event.currentTarget.getElementsByTargetName('div'));
				this.process2=setInterval(function(){display.span(Node)},1);
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
					clearInterval(this.process2);
					//console.log(this.process2);
				}
			}
	}
	});
	// setInterval(function(){display.change();},2400);
	display.dis_img();
	
}


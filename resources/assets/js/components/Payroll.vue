<template>
    <div class="row">   
		<div class="panel panel-default">
			<div class="panel-body">
				<form v:if="!employee.full_time || payroll.overTime>
					
					<input type="integer" class=form-group :v-model=hours>
					<input type="integer" class=form-group :v-model=rate>
					<button type=submit @onclick="total">Submit</button>
				
				
					 v:else
						this.total = employee.role.salary
				</form>
            </div>    
        </div>
    </div>
</template>
find the employee
check if fixed or part time
if fixed check for overTime
if no just give me the base salary 
else compute
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
		props:['id'],
		data(){
			return{
			    
				base_salary:'',
				hours:'',
				rate:'',
				total:'',
				overTime: false,
				payroll:[]
			}
		},
		methods:{
		    axios('/payroll' + this.id)
		
		},
		computed:{
			partTimeTotal(rate,hour){
				return this.total = this.rate*this.hour;
			}
			overTimeTotal(rate, hour){
				return this.total = this.rate*this.hour+this.base_salary;
			}
		}
    }
</script>

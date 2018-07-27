<div id="page-wrap">

		<h4 id="header">INVOICE</h4>

		<div id="identity">

            <p id="address" class="text-capitalize">
                    {{ $invoicedtask->assignee->firstname }} {{ $invoicedtask->assignee->secondname }},
				<br>
				{{ $user->profile->postaladdress }},
				<br>
				{{ $user->profile->locality }}, {{ $user->profile->city }}.

			</p>

            <div id="logo">
				<div class="choreweasel-logo">
					<span class="choreweasel-logo_start">Chore</span>Weasel
				</div>
            </div>

		</div>

		<div style="clear:both"></div>

		<div id="customer">

            <h4 id="customer-title" class="text-capitalize">
                {{ $invoicedtask->assigner->firstname }} {{ $invoicedtask->assigner->secondname
                }},
                <br>
                {{ $invoicedtask->apartment_unit }}, House No. {{ $invoicedtask->apt_unit_no }},
                <br>
                {{ $invoicedtask->locality_street }}, {{ $invoicedtask->city_town }}.
            </h4>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><p>{{ rand() }}</p></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date">{{ \Carbon\Carbon::today()->format('d/m/Y') }}</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">${{ $invoicedtask->total_payable }}</div></td>
                </tr>

            </table>

		</div>

		<table id="items">

		  <tr>
		      <th>Task Category</th>
			  <th>Task Description</th>
			  <th>Start & End Time</th>
			  <th>Hours</th>
		      <th>Rates/Hr</th>


		  </tr>

		  <tr class="item-row">
            <td class="item-name"><div class="delete-wpr"><p>{{ $invoicedtask->taskcategory->taskname }}</p></div></td>
			  <td class="description"><p>
                  {{ $invoicedtask->task_description }}
                  <br>
                  Requirements were - {{ $invoicedtask->task_requirements }}
                </p></td>
		      <td><p class="cost">10:00 - 12:00</p></td>
		      <td><p class="qty">{{ $invoicedtask->hours_worked }}</p></td>
		      <td><span class="price">{{ $invoicedtask->rates }}</span></td>
		  </tr>


		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">${{ $invoicedtask->total_payable }}</div></td>
		  </tr>

		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Amount Due</td>
		      <td class="total-value balance"><div class="due">${{ $invoicedtask->total_payable }}</div></td>
		  </tr>

		</table>

		<div id="terms">
		  <h5>Terms</h5>
		  <p>This is due in the next 48hrs. Finance Charge of 1.5% will be made on unpaid balances after 48 hrs.</p>
		</div>

	</div>
<style>
/*
	 CSS-Tricks Example
	 by Chris Coyier
	 http://css-tricks.com
*/

* { margin: 0; padding: 0; }
body {  }
#page-wrap { width: 800px; margin: 0 auto; }

textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
table { border-collapse: collapse; }
table td, table th { border: 1px solid black; padding: 5px; }

#header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

#address { width: 250px; height: 150px; float: left; }
#customer { overflow: hidden; }

#logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
#logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }
#logoctr { display: none; }
#logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
#logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
#logohelp input { margin-bottom: 5px; }
.edit #logohelp { display: block; }
.edit #save-logo, .edit #cancel-logo { display: inline; }
.edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
#customer-title { font-size: 20px; font-weight: bold; float: left; }

#meta { margin-top: 1px; width: 300px; float: right; }
#meta td { text-align: right;  }
#meta td.meta-head { text-align: left; background: #eee; }
#meta td textarea { width: 100%; height: 20px; text-align: right; }

#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
#items th { background: #eee; }
#items textarea { width: 80px; height: 50px; }
#items tr.item-row td { border: 0; vertical-align: top; }
#items td.description { width: 300px; }
#items td.item-name { width: 175px; }
#items td.description textarea, #items td.item-name textarea { width: 100%; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 20px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }

#terms { text-align: center; margin: 20px 0 0 0; }
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms textarea { width: 100%; text-align: center;}

textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }

.delete-wpr { position: relative; }
.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }

.choreweasel-logo,
.choreweasel-logo span {
    font-size: 42px;
}

span.choreweasel-logo_start {
    display: inline-block;
    color: red;
}

.text-capitalize {
    text-transform: capitalize !important;
}
</style>

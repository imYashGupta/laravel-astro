<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">

	<!-- Sets size and scale of the viewport. -->
	<meta name="viewport" content="width=device-width" initial-scale="1">

	<!-- IE=Edge makes good things happen on Windows Phones. (https://www.emailonacid.com/blog/article/email-development/demystifying-meta-tags-in-email) -->
	<!--[if !mso]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->

	<!-- Disables auto-scaling in iOS Mail 10. (https://litmus.com/blog/9-things-you-need-to-know-about-email-in-ios-10) -->
	<meta name="x-apple-disable-message-reformatting">

	<!-- Will display in auto-preview area in some clients. -->
	<title></title>

	<!-- Desktop Outlook defaults to Times New Roman. Forces a less obscene fallback font. -->
	<!--[if mso]>
		<style>
			* { font-family: sans-serif !important; }
		</style>
	<![endif]-->

	<!-- Webfont reference. For current support: http://stylecampaign.com/blog/2015/02/webfont-support-in-email -->
	<!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
	<!--<![endif]-->

	<style>
		/* Box sizing. Gets decent support. (https://freshmail.com/developers/best-practices-for-email-coding) */
		*,
		*:after,
		*:before {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		/* Prevents small text resizing. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}
		/* Basic reset. Removes default spacing around emails in various clients. (https://templates.mailchimp.com/development/css/reset-styles) */
		html,
		body,
		.document {
			width: 100% !important;
			height: 100% !important;
			margin: 0;
			padding: 0;
		}
		/* Improves text rendering when supported. */
		body {
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}
		/* Centers email to device width in Android 4.4. (https://blog.jmwhite.co.uk/2015/09/19/revealing-why-emails-appear-off-centre-in-android-4-4-kitkat) */
		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}
		/* Removes added spacing within tables in Outlook. (https://templates.mailchimp.com/development/css/client-specific-styles) */
		table,
		td {
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
		}
		/* Removes added spacing within tables in WebKit. */
		table {
			border-spacing: 0;
			border-collapse: collapse;
			table-layout: fixed;
			margin: 0 auto;
		}
		/* Responsive images. Improves rendering of scaled images in IE. */
		img {
			-ms-interpolation-mode: bicubic;
			max-width: 100%;
			border: 0;
		}
		/* Overrules triggered links in iOS. */
		*[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: none !important;
		}
		/* Overrules triggered links in Gmail. */
		.x-gmail-data-detectors,
		.x-gmail-data-detectors *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
		}
		/* Adds hover effects on buttons. */
		.btn {
			-webkit-transition: all 200ms ease;
			transition: all 200ms ease;
		}
		.btn:hover {
			background-color: #222222;
			border-color: #222222;
		}
		/* Media queries o' doom. */
		@media screen and (max-width: 450px) {
			/* Transitions container to a fluid layout. */
			.container {
				width: 100%;
				margin: auto;
			}
			/* Collapses table cells into full-width rows. */
			.stack {
				display: block;
				width: 100%;
				max-width: 100%;
			}
			/* Centers and expands CTA. */
			.btn {
				display: block;
				width: 100%;
				text-align: center;
			}
		}

        @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
	</style>
</head>

<body bgcolor="#E8ECF1">

	<!-- Preheader text. Visible in inbox preview, not in email body. -->
	<div style="display: none; max-height: 0px; overflow: hidden;">
		<!-- Preheader message here -->
	</div>

	<!-- Hack to manage presentation of preheader text. (https://litmus.com/blog/the-little-known-preview-text-hack-you-may-want-to-use-in-every-email) -->
	<div style="display: none; max-height: 0px; overflow: hidden;">
		&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
	</div>

	<table id="section-to-print" bgcolor="#E8ECF1" role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"
		align="center" class="document">
		<tr>
			<td valign="top">

				<!-- Main -->
				<table style="margin-top: 50px;" role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
					width="800" class="container">
					<tr>
						<td bgcolor="#ffffff" style="padding-bottom: 50px;">
							<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"
								align="center" width="100%">
								<tr>
									<td style="padding: 50px;">
										<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0"
											border="0" align="center" width="100%">
											<tr>
												<td style="padding-bottom: 15px; font-family: 'Source Sans Pro', sans-serif; font-size: 26px;  color: #1B2733;">
													<h1 style="margin:0">{{$appData["name"] }}</h1>
												</td>
											</tr>
											<tr>
												<td  style="padding-bottom: 15px; font-family: 'Source Sans Pro', sans-serif; font-size: 26px; line-height: 34px; color: #1B2733;">
													Hello, {{$order->user->name}}.
												</td>
											</tr>
											<tr>
												<td colspan="2"
													style="text-align: left;padding-bottom: 15px; font-family: 'Source Sans Pro', sans-serif; font-size: 18px; line-height: 24px; color: #1B2733;">
													Your Order #{{$order->id}} is dispatched.
												</td>
											 
											</tr>
											<tr>
												<td
													style="text-align: left;padding-bottom: 15px; font-family: 'Source Sans Pro', sans-serif; font-size: 18px; line-height: 24px; color: #1B2733;">
													
													<address style="font-style: normal;"><strong>BILLING INFORMATION:</strong><br>
														{{$order->name}}<br>
                                                        {{ $order->getBilling("address") }}<br>
														{{$order->getBilling("city").",".$order->getBilling("state")}}<br>
                                                        {{ $order->getBilling("country").','.$order->getBilling("pincode") }}
														<br>
														
													</address>
												</td>
												<td
													style="text-align: right;;padding-bottom: 15px; font-family: 'Source Sans Pro', sans-serif; font-size: 18px; line-height: 24px; color: #1B2733;">
													ORDER #{{$order->id}}
													<br>
                                                    {{ $order->created_at->format("F d,Y") }} <br>
													<strong>Email: </strong> {{ $order->getBilling("email") }}
														<br>
														<strong>Phone: </strong>{{$order->getBilling("phone")}}
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<table width="100%" style="margin-top: 35px;" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
														<tbody>
														  <tr>
															<th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" width="52%" align="left">
															  Item
															</th>
															<th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="left">
															  Price
															</th>
															<th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
															  Quantity
															</th>
															<th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                                                            Totals
															</th>
														  </tr>
														  <tr>
															<td height="1" style="background: #bebebe;" colspan="4"></td>
														  </tr>
														  <tr>
															<td height="10" colspan="4"></td>
                                                          </tr>
                                                          @foreach ($order->items as $item)  
                                                          
														  <tr>
															<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1B2733;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                                                                {{$item->product("name")}}
															</td>
                                                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                                &#163;{{$item->listed_price}}</td>
                                                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">
                                                                {{$item->qty}}</td>
                                                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">
                                                                &#163;{{$item->listed_price * $item->qty}}
                                                            </td>
                                                          </tr>
														  <tr>
															<td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
														  </tr>
                                                          @endforeach
														</tbody>
													  </table>
												</td>
												  
											</tr>
											<tr>
												<td colspan="2">
													<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
														<tbody>
														  <tr>
															<td>
															  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
																<tbody>
																  <tr>
																	<td>
													  
																	  <!-- Table Total -->
																	  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
																		<tbody>
																		  <tr>
																			<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
																			  Subtotal
																			</td>
																			<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                                                                                &#163;{{$order->subtotal}}
																			</td>
                                                                          </tr>
                                                                        @if($order->shipping_charge===0)
                                                                        
																		  <tr>
																			<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
																			  Shipping &amp; Handling
																			</td>
																			<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                                                &#163;{{$order->shipping_charge}}
																			</td>
                                                                          </tr>
                                                                    @endif
																	@if(!is_null($order->coupon))

<tr>
  <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
	Coupon Discount
  </td>
  <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
	  -&#163;{{$order->coupon_discount}}
  </td>
</tr>
@endif
																		  <tr>
																			<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
																			  <strong>Total</strong>
																			</td>
																			<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
																			  <strong>&#163;{{$order->amount_paid}}</strong>
																			</td>
																		  </tr>
																		 
																		</tbody>
																	  </table>
																	  <!-- /Table Total -->
													  
																	</td>
																  </tr>
																</tbody>
															  </table>
															</td>
														  </tr>
														</tbody>
													  </table>
												</td>
											</tr>
											<!-- <tr>
												<td align="left">
													<table role="presentation" aria-hidden="true" cellspacing="0"
														cellpadding="0" border="0" align="left" class="container">
														<tr>
															<td style="border-radius: 3px;" bgcolor="#000000">
																<a class="btn"
																	href="{{ route('login') }}"
																	target="_blank"
																	style="font-size: 18px; font-family: 'Source Sans Pro', sans-serif; color: #ffffff; text-decoration: none; text-decoration: none; padding: 10px 20px; border-radius: 2px; border: 1px solid #000000; display: inline-block;">Manage
																	Account</a>
															</td>
														</tr>
													</table>
												</td>
											</tr> -->
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

				<!-- Footer -->
				<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
					width="450" class="container">
					<tr>
						<td align="center"
							style="font-family: 'Source Sans Pro', sans-serif; font-size: 11px; line-height: 16px; padding-top: 20px; color: #aaaaaa;">
							{{env("MAIL_FROM_ADDRESS")}}
						</td>
					</tr>
					<tr>
						<td align="center"
							style="font-family: 'Source Sans Pro', sans-serif; font-size: 11px; line-height: 16px; padding-bottom: 20px; color: #aaaaaa;">
							<!-- Unsubscribe link -->
							<unsubscribe>Unsubscribe from these emails.</unsubscribe>
						</td>
					</tr>
				</table>

			</td>
		</tr>
	</table>
</body>

</html>
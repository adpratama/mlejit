<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Check Out Order</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
	<div class="container">
		<div class="row">

			<div class="col-lg-7">
				<div class="checkout-accordion-wrap">
					<div class="accordion" id="accordionExample">
						<div class="card single-accordion">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Billing Address
									</button>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="billing-address-form">
										<form action="<?= base_url('order/send_order') ?>" method="POST">
											<p><input name="nama" type="text" placeholder="Name" required></p>
											<p><input name="email" type="email" placeholder="Email"></p>
											<p><input name="address" type="text" placeholder="Address"></p>
											<p><input name="phone" type="tel" placeholder="Phone" required></p>
											<p><textarea name="notes" id="notes" cols="30" rows="10" placeholder="Say Something"></textarea></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-5">
				<div class="order-details-wrap">
					<table class="order-details">
						<thead>
							<tr>
								<th class="bold">Your order Details</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody class="order-details-body">
							<?php
							foreach ($cart_content as $value) {
							?>
								<tr>
									<td><?= $value['name'] ?></td>
									<td class="right">Rp<?= number_format($value['price'], 2, ',', '.') ?></td>
									<td class="right"><?= number_format($value['qty']) ?></td>
									<td class="right">Rp<?= number_format($value['subtotal'], 2, ',', '.') ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
						<tbody class="checkout-details">
							<!-- <tr>
								<td>Subtotal</td>
								<td class="right" colspan="3">Rp<?= $total ?></td>
							</tr> -->
							<!-- <tr>
								<td>PPn</td>
								<td class="right" colspan="3">Rp<?= $ppn ?></td>
							</tr> -->
							<tr>
								<td><b>Total</b></td>
								<td class="right" colspan="3"><b>Rp<?= $total ?></b></td>
							</tr>
						</tbody>
					</table>
					<!-- <a href="#" class="boxed-btn">Place Order</a> -->
					<br>
					<?php
					$button = array(
						'name' => 'button',
						'value' => 'Checkout',
						'type' => 'submit',
						'class' => 'cart-btn',
						'style' => 'text-transform: capitalize; font-weight: 400; font-family: Poppins, sans-serif; font-size: 14px;'
					);
					echo form_submit($button);
					?>
				</div>
			</div>

			</form>
		</div>
	</div>
</div>
<!-- end check out section -->
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- The controller supplies database records; this view only handles presentation. -->

<section class="page-heading page-heading-row">
    <div><span class="eyebrow">Ledger / Customers</span><h1>Customer accounts</h1><p>Verified contact records retrieved from the MySQL customer ledger.</p></div>
    <span class="record-count"><?= count($customers) ?> records</span>
</section>

<section class="table-card">
    <div class="table-wrap">
        <table>
            <thead><tr><th>Customer</th><th>Email address</th><th>Phone number</th><th>Date created</th></tr></thead>
            <tbody>
            <?php // foreach repeats one table row for every customer record. ?>
            <?php foreach ($customers as $index => $customer): ?>
                <tr>
                    <td data-label="Customer"><span class="table-person"><span class="mini-avatar" aria-hidden="true"><?= esc(substr($customer['full_name'], 0, 1)) ?></span><span><strong><?= esc($customer['full_name']) ?></strong><small>CUST-<?= str_pad((string) $customer['id'], 3, '0', STR_PAD_LEFT) ?></small></span></span></td>
                    <!-- esc() safely converts special characters before displaying data. -->
                    <td data-label="Email"><a href="mailto:<?= esc($customer['email']) ?>"><?= esc($customer['email']) ?></a></td>
                    <td data-label="Phone"><?= esc($customer['phone']) ?></td>
                    <td data-label="Created"><time datetime="<?= esc($customer['created_at']) ?>"><?= esc(date('M j, Y', strtotime($customer['created_at']))) ?></time></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->endSection() ?>

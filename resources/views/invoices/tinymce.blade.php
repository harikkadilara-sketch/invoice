<table style="width: 100%; border-collapse: collapse; border: none; background: #fff;">
    <tbody>
        <tr>
            <td style="border: none; background: #fff;"><!-- ================= HEADER ================= -->
                <table style="width: 100%; border-collapse: collapse; border: none; background: #fff;">
                    <tbody>
                        <tr>
                            <td style="text-align: center; border: none; background: #fff;"><img src="{{ company_logo }}"
                                    alt="Logo" width="96" height="96"></td>
                            <td style="padding-left: 20px; border: none; background: #fff;">
                                <strong>{{ company_name }}</strong></td>
                        </tr>
                    </tbody>
                </table>
                <br><!-- ================= INFO ================= -->
                <table style="width: 100%; border-collapse: collapse; border: none; background: #fff;">
                    <tbody>
                        <tr>
                            <td style="width: 15%; border: none; background: #fff;">
                                <strong>Date</strong><br><strong>To</strong><br><strong>From</strong></td>
                            <td style="width: 45%; border: none; background: #fff;">: {{ date }}<br>:
                                {{ to }}<br>: {{ from }}</td>
                            <td style="width: 40%; text-align: center; border: none; background: #fff;">
                                <h3><strong>Definitive Confirmation</strong></h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr style="border: 2px solid #000; border-radius: 5px;">
                <hr style="border: 2px solid #000; border-radius: 5px;">
                <p>Thank you for your interest on {{ company_name }}</p>
                <!-- ================= GUEST INFO ================= -->
                <table style="width: 100%; border-collapse: collapse; border: none; background: #fff;">
                    <tbody>
                        <tr>
                            <td style="border: none; background: #fff;"><strong>Res. No</strong><br><strong>Arrival
                                    Date</strong></td>
                            <td style="border: none; background: #fff;">: {{ res_no }}<br>: {{ arrival_date }}
                            </td>
                            <td style="border: none; background: #fff;"><strong>Guest Name</strong><br><strong>Hotel
                                    Name</strong></td>
                            <td style="border: none; background: #fff;">: {{ guest_name }}<br>: {{ hotel_name }}
                            </td>
                            <td style="border: none; background: #fff;"><strong>Depart Date</strong></td>
                            <td style="border: none; background: #fff;">: {{ depart_date }}</td>
                        </tr>
                    </tbody>
                </table>
                <br><!-- ================= ROOM TABLE ================= --> {{ room_rows }}
                <table class="room-table"
                    style="height: 79.4px; width: 39.029%; border-collapse: collapse; border-width: 2px; border-color: #000000;"
                    border="1">
                    <tbody>
                        <tr style="height: 59.2px;">
                            <th style="width: 12.374%; border-width: 2px; border-color: #000000;"><span
                                    style="font-size: 10pt;">QTY</span></th>
                            <th style="width: 30.6198%; border-width: 2px; border-color: #000000; text-align: left;">
                                <span style="font-size: 10pt;">Room Type</span></th>
                            <th style="width: 20.1693%; border-width: 2px; border-color: #000000; text-align: left;">
                                <span style="font-size: 10pt;">Room Rate</span></th>
                            <th style="width: 36.8369%; border-width: 2px; border-color: #000000; text-align: left;">
                                <span style="font-size: 10pt;">Meal</span></th>
                        </tr>
                        <tr style="height: 20.2px;">
                            <td style="width: 12.374%; border-width: 2px; border-color: #000000; text-align: center;">
                                <span style="font-size: 10pt;">1</span></td>
                            <td style="width: 30.6198%; border-width: 2px; border-color: #000000; text-align: left;">
                                <span style="font-size: 10pt;">Quad City View</span></td>
                            <td style="width: 20.1693%; border-width: 2px; border-color: #000000; text-align: left;">
                                <span style="font-size: 10pt;">700</span></td>
                            <td style="width: 36.8369%; border-width: 2px; border-color: #000000; text-align: left;">
                                <span style="font-size: 10pt;">RO</span></td>
                        </tr>
                    </tbody>
                </table>
                <br><!-- ================= TOTAL ================= -->
                <table style="width: 40%; border-collapse: collapse; border: none; background: #fff;">
                    <tbody>
                        <tr>
                            <td style="border: none; background: #fff;"><strong>Total</strong></td>
                            <td style="border: none; background: #fff;">: {{ currency }} {{ total_amount }}</td>
                        </tr>
                    </tbody>
                </table>
                <br><!-- ================= REMARKS ================= -->
                <table style="width: 100%; border-collapse: collapse; border: none; background: #fff;">
                    <tbody>
                        <tr>
                            <td style="border: none; background: #fff;"><strong>Remarks
                                    :</strong><br>{{ remarks }}</td>
                        </tr>
                    </tbody>
                </table>
                <br><!-- ================= FOOTER ================= -->
                <table style="width: 100%; border-collapse: collapse; border: none; background: #fff;">
                    <tbody>
                        <tr>
                            <td style="border: none; background: #fff;"><strong>Our Bank Acc :</strong><br>Account Name
                                : {{ bank_account_name }}<br>Bank Name : {{ bank_name }}<br>Branch :
                                {{ bank_branch }}<br>Account # : {{ bank_account_number }}<br>IBAN # :
                                {{ bank_iban }}<br>Swift Code : {{ bank_swift }}</td>
                            <td style="text-align: center; border: none; background: #fff;">Thanks and Best
                                Regards<br><br>{{ reservation_agent }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr style="border: 2px solid #000; border-radius: 5px;">
                <hr style="border: 2px solid #000; border-radius: 5px;">
            </td>
        </tr>
    </tbody>
</table>

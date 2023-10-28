<table class="w-[100%]">
    <thead class="bg-[#F4F6F8]">
      <tr class="flex justify-between items-center py-[16px] pl-[16px] pr-[48px]">
            <th>
                <div>
                    <input id="default-checkbox" type="checkbox" value="" class="w-[20px] h-[20px] rounded border-[#637381]">
                </div>
            </th>
            <th class="w-[336px] flex gap-[4px] text-[14px] text-[#637381] font-semibold">
                მომხმარებელი
                <img class=" w-[18px] h-[18px]" src="{{ asset('assets/images/invoice/arrow.svg') }}"> 
            </th>
            <th class="text-[14px] text-[#637381] font-semibold" >შექმნა</th>
            <th class="text-[14px] text-[#637381] font-semibold" >ბოლო დრო</th>
            <th class="text-[14px] text-[#637381] font-semibold" >თანხა</th>
            <th class="text-[14px] text-[#637381] font-semibold" >გაგზავნილი</th>
            <th class="text-[14px] text-[#637381] font-semibold" >სტატუსი</th>
      </tr>
    </thead>
    <tbody>
        @include('components.invoice.index.invoiceTable.table.tableitem.tableitem')
    </tbody>
</table>



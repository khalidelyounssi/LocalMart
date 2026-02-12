                @foreach($users as $user)
                <tr id="user-row-{{ $user->id }}" class="hover:bg-green-50/30 transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-slate-100 text-slate-600 rounded-2xl flex items-center justify-center font-black text-sm group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                                {{ substr($user->name, 0, 2) }}
                            </div>
                            <div>
                                <div class="font-bold text-slate-900 text-sm">{{ $user->name }}</div>
                                <div class="text-xs text-gray-400 font-medium">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                     @if(auth()->user()->can('manage roles'))

                    <td class="px-6 py-5 text-center">
                        <select onchange="updateUserRole({{$user->id}}, this.value)"
                            class="bg-gray-50 border-none rounded-xl px-2 py-1 text-[10px] font-black uppercase cursor-pointer focus:ring-2 focus:ring-green-500">
                            <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                            <option value="moderator" {{ $user->hasRole('moderator') ? 'selected' : '' }}>Moderator</option>
                            <option value="seller" {{ $user->hasRole('seller') ? 'selected' : '' }}>Seller</option>
                            <option value="client" {{ $user->hasRole('client') ? 'selected' : '' }}>Client</option>
                        </select>
                    </td>
                     @endif

                    <td class="px-6 py-5 text-center">
                        <button type="button"
                            onclick="updateUserStatus({{ $user->id }})"
                            id="status-btn-{{ $user->id }}"
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl text-[10px] font-black uppercase transition-all duration-300 {{ $user->status == 'active' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">

                            <span id="status-dot-{{ $user->id }}" class="w-1.5 h-1.5 {{ $user->status == 'active' ? 'bg-green-500' : 'bg-red-500' }} rounded-full"></span>
                            <span id="status-text-{{ $user->id }}">{{ $user->status }}</span>
                        </button>
                    </td>

                    <td class="px-6 py-5">
                        <div id="date-{{ $user->id }}" class="text-sm font-bold text-slate-700">
                            {{ $user->created_at->format('d M Y') }}
                        </div>
                    </td>
                    @can('manage roles')
                    <td class="px-6 py-5 text-right pr-8">
                        <div class="flex justify-end gap-2">
                            <button type="button"
                                onclick="deleteUser({{ $user->id }})"
                                class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all duration-300 shadow-sm">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                    @endcan
                </tr>
                @endforeach
                <tr id="pagination-row">
                    <td colspan="5" class="p-6 bg-gray-50/50 border-t border-gray-50">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">
                                Page {{ $users->currentPage() }} sur {{ $users->lastPage() }}
                            </p>
                            <div class="ajax-pagination">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </td>
                </tr>